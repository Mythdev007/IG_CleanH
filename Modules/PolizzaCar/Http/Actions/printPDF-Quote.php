<?php 

namespace Modules\PolizzaCar\Http\Actions;

use Modules\PolizzaCar\Entities\PolizzaCar;
use Modules\Platform\User\Entities\User;
use App\Notifications\UserInvitationNotification;
use Illuminate\Support\Str;
use Modules\PolizzaCar\Entities\PolizzaCarProcurement;
use Modules\Platform\Notifications\Entities\NotificationPlaceholder;
use PDFMerger;
use setasign\Fpdi\Fpdi;


        
if ($this->permissions['browse'] != '' && !\Auth::user()->hasPermissionTo($this->permissions['browse'])) {
    flash(trans('core::core.you_dont_have_access'))->error();
    return redirect()->route($this->routes['index']);
}

$repository = $this->getRepository();

$entity = $repository->find($identifier);

$this->entity = $entity;

if (empty($entity)) {
    flash(trans('core::core.entity.entity_not_found'))->error();

    return redirect(route($this->routes['index']));
}

if ($this->blockEntityOwnableAccess()) {
    flash(trans('core::core.you_dont_have_access'))->error();
    return redirect()->route($this->routes['index']);
}

$this->entityIdentifier = $entity->id;

$this->entity = $entity;

/* use this to print a view
$printData = [
    'entity' => $this->entity
];

$pdf = \PDF::loadView('polizzacar::pdf.print', $printData);
*/

$fullPathToFile = storage_path('pdf/7_Preventivo_CAR_CHUBB_ITALGAS_0719.pdf');

define('EURO',chr(128));

$pdf = new FPDI();
$pdf->AddPage();
$pageCount = $pdf->setSourceFile($fullPathToFile);

// import a page
$templateId = $pdf->importPage(1);
// get the size of the imported page
$size = $pdf->getTemplateSize($templateId);

// use the imported page
$pdf->useTemplate($templateId);
$pdf->SetFont('Times', 'B', '10'); 
// from entity
$pdf->SetXY(70, 66);
$pdf->Write(0, $entity->company_name);
$pdf->SetXY(70, 72);
$pdf->Write(0, $entity->company_vat);
$pdf->SetXY(70, 94);
$pdf->Write(0, $entity->works_type->name);
$pdf->SetXY(70, 100);
$pdf->Write(0, $entity->works_place_city);
$pdf->SetXY(70, 106);
$pdf->Write(0, $entity->works_place_pr);
$pdf->SetXY(100, 130);
$pdf->Write(0, EURO . ' ' . number_format($entity->car_p1_limit_amount,2));
$pdf->SetXY(100, 136);
$pdf->Write(0, EURO . ' ' . number_format($entity->car_p2_limit_amount,2));
$pdf->SetXY(100, 142);
$pdf->Write(0, EURO . ' ' . number_format($entity->car_p3_limit_amount,2));
$pdf->SetXY(125, 130);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $entity->car_p1_premium_net));
$pdf->SetXY(125, 136);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $entity->car_p2_premium_net));
$pdf->SetXY(125, 142);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $entity->car_p3_premium_net));
$pdf->SetXY(145, 130);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $entity->car_p1_premium_gross));
$pdf->SetXY(145, 136);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $entity->car_p2_premium_gross));
$pdf->SetXY(145, 142);
$pdf->Write(0, iconv('UTF-8', 'windows-1252', $entity->car_p3_premium_gross));
$pdf->SetXY(50, 182);
$pdf->Write(1, date('d/m/Y', strtotime($entity->date_request)));
$pdf->SetXY(40, 189);
$pdf->Write(1, $entity->works_duration_mm / 12 . ' anni');
//$pdf->SetXY(50, 136);
//$pdf->Write(1, date('d/m/Y', strtotime($entity->date_effect)));
// Output the new PDF
// $pdf->Output();       

$output = $identifier . '_7_Preventivo_CAR_CHUBB_ITALGAS_0719.pdf';

$pdf->Output($output, 'F');

$pdf_full = new PDFMerger();

// Add all the pages of the PDF to merge 
$pdf_full->addPDF(storage_path('pdf/1_Cover_CAR_CHUBB_Italgas_0919.pdf'), 'all');
$pdf_full->addPDF(storage_path('pdf/2_Allegati_3&4_CAR_Italgas_0919.pdf'), 'all');
$pdf_full->addPDF(storage_path('pdf/4_Consensi_Contraente_CAR_Italgas_0919.pdf'), 'all');
$pdf_full->addPDF(storage_path('pdf/3_Privacy_InformativaStrategica_0918.pdf'), 'all');
$pdf_full->addPDF(storage_path('pdf/5_Cover_CAR_CHUBB_ITALGAS_0919_SI.pdf'), 'all');
$pdf_full->addPDF(base_path('public/' . $identifier . '_7_Preventivo_CAR_CHUBB_ITALGAS_0719.pdf'), 'all');
$pdf_full->addPDF(storage_path('pdf/6_SetInformativo_Convenzione_CAR_italgas_170419.pdf'), 'all'); 

// $pdf_full->merge('download', $identifier.'_CAR.pdf'); 
$pdf_full->merge('stream', $identifier.'_CAR.pdf'); 

if (file_exists(base_path('public/'.$identifier . '_7_Preventivo_CAR_CHUBB_ITALGAS_0719.pdf'))) {
    unlink(base_path('public/'.$identifier . '_7_Preventivo_CAR_CHUBB_ITALGAS_0719.pdf'));
}

$user = auth()->user();

activity()
    ->causedBy($user)
    ->performedOn($entity)
    ->log('Contract viewed');



//end 
        
/* $polizza = PolizzaCar::find($entity->id);




            flash(trans('PolizzaCar::PolizzaCar.invite_sent_with_login'))->success();
            // notification on screen

                $Supervisor = User::where('id', 2)->first();


                $messaggio = 'Preventivo n. '. $entity->id .' - '. $entity->company_name .' visualizzato. In attesa di Documenti firmati.';
    
                $placeholder = new NotificationPlaceholder();
                $placeholder->setContent($messaggio);
                $placeholder->setRecipient($Supervisor);

                $placeholder->setColor('bg-green');
                $placeholder->setIcon('assignment');
                $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));
    
                // $Supervisor->notify(new GenericNotification($placeholder));
                
                flash(trans('PolizzaCar::PolizzaCar.invite_sent'))->success();

        $polizza->update([
            'status_id'      => 3, // Waiting Signed Documents
        ]);

        $procurement = PolizzaCarProcurement::where('id', $entity->procurement_id)->first();
        if($procurement) {
            $procurement->update([
                'insurance_policy' => $polizza->id, // mark as used so it can't be reused
            ]);
        }
        
*/