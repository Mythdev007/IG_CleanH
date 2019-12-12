<?php

namespace Modules\PolizzaCar\Http\Controllers;

use Modules\Platform\Core\Http\Controllers\ModuleCrudController;

use Modules\PolizzaCar\Datatables\PolizzaCarDatatable;
use Modules\PolizzaCar\Http\Forms\PolizzaCarForm;
use Modules\PolizzaCar\Entities\PolizzaCar;
use Modules\PolizzaCar\Http\Requests\PolizzaCarRequest;
use Illuminate\Http\Request;
use Modules\PolizzaCar\Entities\PianoTariffario;
use Modules\Platform\User\Entities\User;
use Modules\Platform\Notifications\Entities\NotificationPlaceholder;

use Modules\PolizzaCar\Entities\PolizzaCarProcurement;
use PDFMerger;
use setasign\Fpdi\Fpdi;
use Modules\Core\Notifications\GenericNotification;
use App\Notifications\UserInvitationNotification;
use Modules\Platform\Core\Datatable\ActivityLogDataTable;



use Modules\PolizzaCar\Service\CsvExportService;

class PolizzaCarController extends ModuleCrudController
{

    protected $datatable = PolizzaCarDatatable::class;
    protected $formClass = PolizzaCarForm::class;
    protected $storeRequest = PolizzaCarRequest::class;
    protected $updateRequest = PolizzaCarRequest::class;
    protected $entityClass = PolizzaCar::class;

    protected $moduleName = 'polizzacar';

    protected $showMassActionButtons = false;

    protected $permissions = [
        'browse' => 'polizzacar.browse',
        'create' => 'polizzacar.create',
        'update' => 'polizzacar.update',
        'destroy' => 'polizzacar.destroy'
    ];

    protected $moduleSettingsLinks = [
        ['route' => 'polizzacar.category.index', 'label' => 'settings.category'],
        ['route' => 'polizzacar.procurement.index', 'label' => 'settings.procurement'],
        ['route' => 'polizzacar.status.index', 'label' => 'settings.status'],
        ['route' => 'polizzacar.works_type.index', 'label' => 'settings.works_type'],
        ['route' => 'polizzacar.piano_tariffario.index', 'label' => 'settings.piano_tariffario']
    ];

    protected $settingsPermission = 'polizzacar.settings';

    protected function setupCustomButtons()
    {
        $user = auth()->user();

        if ($this->entity->pdf_signed_contract == '') { // se non c'e contratto firmato
            $this->customShowButtons[] = array(
                'href' => '#',
                'attr' => [
                'class' => 'btn btn-crud bg-pink waves-effect pull-right docuAjax',
                ],
                'label' => 'DocuSign Ajax' // trans('PolizzaCar::PolizzaCar.approve')
            );
            $this->customShowButtons[] = array(
                'href' => route('polizzacar.polizzacar.docusign', $this->entity->id),
                'attr' => [
                'class' => 'btn btn-crud bg-pink waves-effect pull-right',
                ],
                'label' => 'DocuSign' // trans('PolizzaCar::PolizzaCar.approve')
            );
        } else {
            $this->customShowButtons[] = array(
                'href' => route('polizzacar.polizzacar.docusign', $this->entity->id),
                'attr' => [
                'class' => 'btn btn-crud bg-pink waves-effect pull-right',
                ],
                'label' => 'DocuSign test' // trans('PolizzaCar::PolizzaCar.approve')
            );
        }

        // if ( Auth::user()->id == 1 ) { // admin

        $roleName = \Auth::user()->getRoleNames()->first();

        if (in_array($roleName, ['admin', 'strategica'])) { // Admin & Strategica
            if ($this->entity->status_id == 2) { // waiting approval
                $this->customShowButtons[] = array(
                    'href' => route('polizzacar.polizzacar.approve', $this->entity->id),
                    'attr' => [
                    'class' => 'btn btn-crud bg-orange waves-effect pull-right',                       
                    ],
                    'label' => trans('PolizzaCar::PolizzaCar.approve')
                );
            }
        }
        
        if (in_array($roleName, ['admin', 'strategica'])) { // Admin & Strategica
            if ($this->entity->status_id == 4) { // waiting verify
                $this->customShowButtons[] = array(
                    'href' => route('polizzacar.polizzacar.sendOrder', $this->entity->id),
                    'attr' => [
                    'class' => 'btn btn-crud bg-orange waves-effect pull-right',
                    ],
                    'label' => trans('PolizzaCar::PolizzaCar.send_order')
                );
                $this->customShowButtons[] = array(
                    'href' => route('polizzacar.polizzacar.downloadCsv'),
                    'attr' => [
                    'class' => 'btn btn-crud bg-blue waves-effect pull-right',
                    ],
                    'label' => trans('PolizzaCar::PolizzaCar.download_csv')
                );
            }
            if ($this->entity->status_id == 5) { // elaborazione
                $this->customShowButtons[] = array(
                    'href' => route('polizzacar.polizzacar.downloadCsv'),
                    'attr' => [
                    'class' => 'btn btn-crud bg-blue waves-effect pull-right',
                    ],
                    'label' => trans('PolizzaCar::PolizzaCar.download_csv')
                );
            }
        }
        if ($this->entity->status_id == 3) {
                $this->customShowButtons[] = array(
                    'href' => route('polizzacar.polizzacar.print', $this->entity->id),
                    'attr' => [
                    'class' => 'btn btn-crud bg-blue waves-effect pull-right',
                    'target' => '_blank',
                    ],
                    'label' => trans('PolizzaCar::PolizzaCar.quotePDF')
                );
            $this->customShowButtons[] = array(
                'href' => '#',
                'attr' => [
                'class' => 'btn btn-crud bg-green waves-effect pull-right btnUploadFile',
                ],
                'label' => trans('PolizzaCar::PolizzaCar.upload_signed_doc')
            );

            $this->customShowButtons[] = array(
                'href' => '#',
                'attr' => [
                'class' => 'btn btn-crud bg-green waves-effect pull-right btnUploadFile2',
                ],
                'label' => trans('PolizzaCar::PolizzaCar.upload_payment_proof')
            );
        }
        if ($this->entity->status_id == 6) {
            $this->customShowButtons[] = array(
                'href' => route('polizzacar.polizzacar.printCertificato', $this->entity->id),
                'attr' => [
                'class' => 'btn btn-crud bg-green waves-effect pull-right',
                'target' => '_blank',
                ],
                'label' => trans('PolizzaCar::PolizzaCar.CertificatoPDF')
            );
        }
    }

     protected $sectionButtons = [
        [
            'section' => 'contractor',
            'class' => 'm-r-10',
            'id' => 'contractor-copy-from-procurement',
            'href' => '#',
            'label' => 'copy_from_procurement',
            'icon' => 'fa fa-copy',
            'title' => 'copy_from_procurement',
        ]
    ]; 

    protected $cssFiles = [
        'VAANCE_PolizzaCar.css'
    ];

    protected $jsFiles = [
        'VAANCE_PolizzaCar.js'
    ];
    
    protected $showFields = [
        'information' => [
            'id' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'date_request' => [
                'type' => 'date',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
                ],
            'procurement_id' => [
                'type' => 'manyToOne',
                'relation' => 'procurement',
                'column' => 'company_name',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
                ],
            'contract_code' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ],
            'status_id' => [
                'type' => 'manyToOne',
                'relation' => 'status',
                'column' => 'name',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6 status'
                ],
        ],
        'contractor' => [
            'company_name' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6'
            ],
            'company_vat' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'company_email' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6'
            ],

            'company_phone' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'company_address' => [
                'type' => 'text',
                'col-class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6 clear-left'
            ],

            'company_city' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],

            'company_cap' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],

            'company_provincia' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'country_id' => [
                'type' => 'manyToOne',
                'relation' => 'country',
                'column' => 'name',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
        ],
        'procurement' => [
            'works_descr' => [
                'type' => 'text',
                'col-class' => 'col-lg-11 col-md-11 col-sm-11 col-xs-11'
            ],
            'works_type_details' => [
                'type' => 'manyToOne',
                'relation' => 'works_type',
                'column' => 'name',
                'col-class' => 'col-lg-7 col-md-7 col-sm-6 col-xs-6'
            ],
            'works_place_city' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ],
            'works_place_pr' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ],
            'works_duration_mm' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6 clear-left',
                'in_show_view' => false

            ], 
            'works_duration_dd' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ], 
            'risk_id' => [
                'type' => 'manyToOne',
                'relation' => 'tariffa',
                'column' => 'name',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6'
            ],
            'coeff_tariffa' => [
                'type' => 'decimal',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6',
                'in_show_view' => false
            ],
            'tax_rate' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6',
                'in_show_view' => false
            ], 
        ],
        'warranties' => [
            'sezione_a' => [
                'type' => 'text',
                'col-class' => 'col-lg-12 col-md-12'
            ],
            'partita_1' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12'
            ],
            'car_p1_limit_amount' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p1_premium_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p1_premium_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            
            'partita_2' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12'
            ],
            'car_p2_limit_amount' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p2_premium_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p2_premium_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'partita_3' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12'
            ],
            'car_p3_limit_amount' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p3_premium_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'car_p3_premium_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'sezione_b' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4'
            ],
            'car_civil_liability' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'sezione_b_terms' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'total_labels' => [
                'type' => 'text',
                'col-class' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12 clear-left'
            ],
            'partite_total' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'total_gross' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
            'total_net' => [
                'type' => 'text',
                'col-class' => 'col-lg-2 col-md-2 col-sm-4 col-xs-6'
            ],
        ],
    ];

    protected $languageFile = 'PolizzaCar::PolizzaCar';

    protected $routes = [
        'index' => 'polizzacar.polizzacar.index',
        'create' => 'polizzacar.polizzacar.create',
        'show' => 'polizzacar.polizzacar.show',
        'edit' => 'polizzacar.polizzacar.edit',
        'store' => 'polizzacar.polizzacar.store',
        'destroy' => 'polizzacar.polizzacar.destroy',
        'update' => 'polizzacar.polizzacar.update',
        'import' => 'polizzacar.polizzacar.import',
        'import_process' => 'polizzacar.polizzacar.import.process'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /* protected function setupIndexTabButtons()
    {
        $this->indexTabButtons[] = array(
            'href' => '#all',
            'default' => true,
            'attr' => [
                'class' => 'waves-effect waves-block',
                'role' => 'tab',
                'data-toggle'=>"tab",
                'onClick' => "VAANCE_Datatable.headerFilterReset('dataTableBuilder')"
            ],
            'label' => trans('core::core.header_all')
        );
        $this->indexTabButtons[] = array(
            'href' => '#attesa',
            'attr' => [
                'class' => ' waves-effect waves-block',
                'role' => 'tab',
                'data-toggle'=>"tab",
                'onClick' => "VAANCE_Datatable.headerFilterSet('status_id','dataTableBuilder','Attesa Verifica Documenti')"
            ],
            'label' => trans('core::core.header_assigned')
        );
    } */

        /**
     * Overwritten show function
     *
     * @param $identifier
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($identifier)
    {   

               
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

        $this->beforeShow(request(), $entity);

        if (request('mode') == 'json') {
            return response()->json($this->entity);
        }

        $view = view('polizzacar::show');

        $view->with('entity', $entity);
        $view->with('show_fields', $this->showFields);
        $view->with('show_fileds_count', count($this->showFields));

        $view->with('next_record', $repository->next($entity));
        $view->with('prev_record', $repository->prev($entity));
        $view->with('disableNextPrev', $this->disableNextPrev);

        $this->setupCustomButtons();
        $this->setupActionButtons();
        $view->with('customShowButtons', $this->customShowButtons);
        $view->with('actionButtons',$this->actionButtons);
        $view->with('commentableExtension', false);
        $view->with('actityLogDatatable', null);
        $view->with('attachmentsExtension', true);
        $view->with('entityIdentifier', $this->entityIdentifier);


        $view->with('hasExtensions', false);

        $view->with('relationTabs', $this->setupRelationTabs($entity));

        $view->with('baseIcons', $this->baseIcons);

        /*
         * Extensions
         */

        if (in_array(self::COMMENTS_EXTENSION, class_uses($this->entity))) {
            $view->with('commentableExtension', true);
            $view->with('hasExtensions', true);
        }
        if (in_array(self::ACTIVITY_LOG_EXTENSION, class_uses($this->entity))) {
            $activityLogDataTable = \App::make(ActivityLogDataTable::class);
            $activityLogDataTable->setEntityData(get_class($entity), $entity->id);
            $view->with('actityLogDatatable', $activityLogDataTable->html());
            $view->with('hasExtensions', true);
        }
        if (in_array(self::ATTACHMENT_EXTENSION, class_uses($this->entity))) {
            $view->with('attachmentsExtension', true);
            $view->with('hasExtensions', true);
        }

        /*
         * add pdf parts.
         */
        if (!empty($entity->pdf_signed_contract) || !empty($entity->pdf_payment_proof)) {
            $view->with('hasPdfs', true);
            $pdfshowFields = [
                'signed_pdf' => [
                    'pdf_signed_contract' => [
                        'type' => 'aTag',
                        'col-class' => 'col-lg-5 col-md-5 col-sm-5 col-xs-5',
                        'href' => route('polizzacar.polizzacar.showPDF', ['pdf'=>$entity->pdf_signed_contract]),
                    ],
                    'pdf_payment_proof' => [
                        'type' => 'aTag',
                        'col-class' => 'col-lg-5 col-md-5 col-sm-5 col-xs-5',
                        'href' => route('polizzacar.polizzacar.showPDF', ['pdf'=>$entity->pdf_payment_proof]),
                    ],
                ],
            ];
            $view->with('pdfshowFields', $pdfshowFields);
        } else {
            $view->with('hasPdfs', false);
        }

        \JavaScript::put([
            'polizza_Id' => $entity->id,
        ]);

        return $view;
    }

    /**
     * Polizza CAR Approve and Invite.
     *
     * @param $identifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function approvePolizzaCar($identifier)
    {
        $sourcePath = __DIR__.'/../Actions/approve.php';

        include($sourcePath);

        return redirect()->route('polizzacar.polizzacar.show',$polizza->id);
        // return redirect(route($this->routes['index']));
        
    }
    
    /**
     * Polizza CAR print
     *
     * @param $identifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function printPolizzaCar($identifier)
    {
        $sourcePath = __DIR__.'/../Actions/printPDF-Quote.php';

        include($sourcePath);

        return $pdf->inline($identifier . '_CAR.pdf');

    }

    /**
     * Polizza CAR printCertificato
     *
     * @param $identifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function printCertificatoPolizzaCar($identifier)
    {

        $sourcePath = __DIR__.'/../Actions/printPDF-Cert.php';

        include($sourcePath);

        return $pdf->Output($identifier . '_8_Certificato_CAR_CHUBB_ITALGAS_0719.pdf', 'I'); 
    }

    /**
     * Polizza CAR send to contractor.
     *
     * @param $identifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sendToContractorPolizzaCar($identifier)
    {
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

        $polizza = PolizzaCar::find($entity->id);

        // check whether current user is Supervisor.
        $user = auth()->user();

        if ($user->role_id == 2) {
            $user->notify(new UserInvitationNotification($polizza, 'send_to_contractor'));  
            // now set the status_id of the polizzacar as 3.
            $polizza->status_id = 3;
            $polizza->save();

            flash(trans('core::core.success_send_to_contractor'))->success();
            // return redirect(route($this->routes['index']));
            return redirect()->route('polizzacar.polizzacar.show',$polizza->id);

        } else {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }
    }

    /**
     * Polizza CAR Sign and Accept.
     *
     * @param $identifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signAndAcceptPolizzaCar($identifier)
    {
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

        $polizza = PolizzaCar::find($entity->id);

        // check whether current user is Supervisor.
        $user = auth()->user();

        if ($user->role_id == 2) {
            $user->notify(new UserInvitationNotification($polizza, 'send_to_contractor'));  
            // now set the status_id of the polizzacar as 3.
            $polizza->status_id = 3;
            $polizza->save();

            flash(trans('core::core.success_send_to_contractor'))->success();
            // return redirect(route($this->routes['index']));
            return redirect()->route('polizzacar.polizzacar.show',$polizza->id);

        } else {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }
    }


    
    /**
     * Polizza upload 2 pdf files.
     *
     * @param $identifier
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function uploadPDFfilesPolizzaCar(Request $request)
    {
        // $request->validate([
        //     'pdf_signed_contract' => 'required|file',
        //     'pdf_payment_proof' => 'required|file',
        // ]);

        // save files.
        $polizza = PolizzaCar::find($request->polizzaId);

        $fullPath = storage_path('signed_pdf/'. $polizza->id .'/');
                    
        if (!\File::exists($fullPath))
        {
            \File::makeDirectory($fullPath, 0755, true, true);
        }
        // $polizza->update([
        //     'pdf_signed_contract' => $fileName // set filename to DB
        // ]);
                    
        $field = $request->field_name;

        // $fileName = $request->$field->getClientOriginalName();
        // $request->$field->move($fullPath, $fileName);

        $fileName = $request->$field->getClientOriginalName();
        $request->$field->move(storage_path('uploaded_docs'), $fileName);


        // update table.
        $polizza->$field = $fileName;

        $polizza->save();

        return response()->json(['pdf_signed_contract' => $polizza->pdf_signed_contract, 'pdf_payment_proof' => $polizza->pdf_payment_proof]);

        
        // return response()->json(['uploaded' => '/upload/'.$fileName]);
    }

    public function sendOrderPolizzaCar($identifier)
    {
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

        $polizza = PolizzaCar::find($entity->id);
        // $polizza = PolizzaCar::find($identifier);
        $polizza->status_id = 5;
        $polizza->save();
        (new CsvExportService())->exportCsv();
        $polizza->order_sent_at = \Carbon\Carbon::now();
        

            $Supervisor = User::where('id', 2)->first();

            $messaggio = 'Polizza n. '. $polizza->id .' - '. $polizza->company_name .' inviata alla compagnia.';

            $placeholder = new NotificationPlaceholder();
            $placeholder->setContent($messaggio);
            $placeholder->setRecipient($Supervisor);
                $placeholder->setColor('bg-blue');
                $placeholder->setIcon('compare_arrows');
                $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));
            $Supervisor->notify(new GenericNotification($placeholder));
           

            $user = User::where('email', $polizza->company_email)->first();

            $placeholder = new NotificationPlaceholder();
            $placeholder->setContent($messaggio);
            $placeholder->setRecipient($user);
                $placeholder->setColor('bg-blue');
                $placeholder->setIcon('compare_arrows');
                $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));
            if(isset($user))
                $user->notify(new GenericNotification($placeholder));

            flash(trans('PolizzaCar::PolizzaCar.order_request'))->success();
            // return redirect(route($this->routes['index']));
            return redirect()->route('polizzacar.polizzacar.show',$polizza->id);

    }

    public function receiveResultPolizzaCar($identifier)
    {
        $repository = $this->getRepository();

        $entity = $repository->find($identifier);

        $this->entity = $entity;

        if (empty($entity)) {
            flash(trans('core::core.entity.entity_not_found'))->error();

            return redirect(route($this->routes['index']));
        }
        
        $polizza = PolizzaCar::find($entity->id);

        // here to do something about reading the response 

        $polizza->status_id = 6;
        $polizza->save();

        $setWho = $polizza->company_email;

        // \Notification::route('mail', $setWho)
        //    ->notify(new UserInvitationNotification($polizza, 'order_complete')); 

            $Supervisor = User::where('role_id', 2)->first();

            $messaggio = 'Polizza n. '. $polizza->id .' - '. $polizza->company_name .' attivata con successo.';

            $placeholder = new NotificationPlaceholder();
            $placeholder->setContent($messaggio);
            $placeholder->setRecipient($Supervisor);
            $placeholder->setColor('bg-green');
            $placeholder->setIcon('check_circle_outline');
            $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));
        // $Supervisor->notify(new GenericNotification($placeholder));
           

            $user = User::where('email', $polizza->company_email)->first();

            $placeholder = new NotificationPlaceholder();
            $placeholder->setContent($messaggio);
            $placeholder->setRecipient($user);
                $placeholder->setColor('bg-green');
                $placeholder->setIcon('check_circle_outline');
                $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));

            // $user->notify(new GenericNotification($placeholder));

        flash(trans('PolizzaCar::PolizzaCar.order_sent'))->success();
            // return redirect(route($this->routes['index']));
            return redirect()->route('polizzacar.polizzacar.show',$polizza->id);

    }

    protected function setupActionButtons()
    {
        $this->actionButtons[] = array(
            'href' => route($this->routes['create'], ['copy' => $this->entity->id]),
            'attr' => [

            ],
            'label' => trans('core::core.btn.copy')
        );
    }

    /**
     * Return company settings to set in quote
     * @return \Illuminate\Http\JsonResponse
     */
    public function companySettings()
    {
        return response()->json([
            'data' => SettingsHelper::companySettings()
        ]);
    }
    

    /**
     * return data from related procurement
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function copyDataFromProcurement(Request $request)
    {
        $procurementId = $request->get('procurement_id', null);

        $procurement = PolizzaCarProcurement::find($procurementId);

        $procurementData = [
            'company_name' => '',
            'company_vat' => '',
            'company_email' => '',
            'company_phone' => '',
            'company_address' => '',
            'company_city' => '',
            'company_cap' => '',
            'company_provincia' => '',
            'country' => '',
            'works_type_details' => '',
            'works_descr' => '',
            'works_place_city' => '',
            'works_place_pr' => '',
            'works_duration_mm' => '',
            
        ];

        if (!empty($procurement)) {
            $procurementData = [
                'company_name' => $procurement->company_name,
                'company_vat' => $procurement->company_vat,
                'company_email' => $procurement->company_email,
                'company_phone' => $procurement->company_phone,
                'company_address' => $procurement->company_address,
                'company_city' => $procurement->company_city,
                'company_cap' => $procurement->company_cap,
                'company_provincia' => $procurement->company_provincia,
                'country' => $procurement->country,
                'works_type_details' => $procurement->works_type_details,
                'works_descr' => $procurement->works_descr,
                'works_place_city' => $procurement->works_place_city,
                'works_place_pr' => $procurement->works_place_pr,
                'works_duration_mm' => $procurement->works_duration_mm,
                
            ];
        }

        return response()->json(
            [
                'data' => $procurementData
            ]
        );
    }

    public function downloadCsv(Request $request)
    {
        if ($this->permissions['browse'] != '' && !\Auth::user()->hasPermissionTo($this->permissions['browse'])) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        (new CsvExportService())->exportCsv();

        // abort_if(Gate::denies('import_model_import'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        /* $filename = config('vaance.facility_code') . '_' . date('Ymd') . '.csv';

        $file = storage_path('app/exports/' . $filename);
        $file = 'ITALGAS_20191201.csv';
        var_dump($file);
        
        if (!file_exists($file)) {
            return back()->withMessage(trans('cruds.user.csv_file_not_found'));
        }

        return response()->download($file);*/
    }
    
    /**
     * return data from related tariffa
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTariffa(Request $request)
    {
        $riskId = $request->get('risk_id', null);

        $tariffa = PianoTariffario::find($riskId);

        $tariffaData = [
            'mm_24' => '',
            'mm_36' => '',
            'tax_rate' => '',
            'commission' => '',
        
        ];

        if (!empty($tariffa)) {
            $tariffaData = [
                'mm_24' => $tariffa->mm_24,
                'mm_36' => $tariffa->mm_36,
                'tax_rate' => $tariffa->tax_rate,
                'commission' => $tariffa->commission,
                
            ];
        }

        return response()->json(
            [
                'data' => $tariffaData
            ]
        );
    }

    public function updateSignedContractPdfStatus(Request $request)
    {
        $return = ['status' => 'error', 'msg' => ''];

        $polizza = PolizzaCar::find($request->polizzaId);

        // check whether 2 pdf files uploaded.
        if (empty($polizza->pdf_signed_contract)) {            
            $return['msg'] = 'Ooh, Signed contract pdf is empty. Please upload it.';
            //flash('Ooh, Signed contract pdf is empty. Please upload it.')->error();
            
        }  else {
            // change status.
            if (empty($polizza->pdf_payment_proof))//when uploading 2 files , update status
                $polizza->status_id = 4;
            $polizza->save();

            // send email to Supervisor
            $Supervisor = User::where('id', 2)->first();

            if ($Supervisor) {
                // $Supervisor->notify(new UserInvitationNotification($polizza, 'check_pdfs'));    
                $invitation_notification = new UserInvitationNotification($polizza, 'check_pdfs');
                $Supervisor = User::where('id', 2)->first();

                // $Supervisor->notify($invitation_notification);    
            } else {
                // abort(403, 'Ooh, Can not find Supervisor. Please check it out.');
                flash(trans('core::core.can_not_find_supervisor'))->error();
            }
            flash(trans('PolizzaCar::PolizzaCar.uploaded_doc_success'))->success();
            $return['msg'] = trans('PolizzaCar::PolizzaCar.uploaded_doc_success');
            $Supervisor = User::where('id', 2)->first();

            $messaggio = 'Polizza n. '. $polizza->id .' - '. $polizza->company_name .' documenti caricati da verificare.';

            $placeholder = new NotificationPlaceholder();
            $placeholder->setContent($messaggio);
            $placeholder->setRecipient($Supervisor);
            $placeholder->setColor('bg-orange');
                    $placeholder->setIcon('playlist_add_check');
                    $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));

            // $Supervisor->notify(new GenericNotification($placeholder));

            $user = User::where('email', $polizza->company_email)->first();
    
                $messaggio = 'Polizza n. '. $polizza->id .' - '. $polizza->company_name .' documenti caricati con successo.';
    
                $placeholder = new NotificationPlaceholder();
                $placeholder->setContent($messaggio);
                $placeholder->setRecipient($user);
                    $placeholder->setColor('bg-orange');
                    $placeholder->setIcon('playlist_add_check');
                    $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));

                // $user->notify(new GenericNotification($placeholder));


            $return['status'] = 'ok';
            
        }
        //flash(trans('PolizzaCar::PolizzaCar.uploaded_doc_success'))->success();
        return response()->json(
            [
                'data' => $return
            ]
        );

        // return Redirect::to('polizzacar.polizzacar.show',$polizza->id);

        
    }

    public function updatePaymentProofPdfStatus(Request $request)
    {
        $return = ['status' => 'error', 'msg' => ''];

        $polizza = PolizzaCar::find($request->polizzaId);

        // check whether pdf files uploaded.
        if (empty($polizza->pdf_payment_proof)) {
            $return['msg'] = 'Ooh, Payment proof pdf is empty. Please upload it.';    
            //flash(trans('core::core.can_not_find_supervisor'))->error();        
        } else {
            // change status.
            if (empty($polizza->pdf_signed_contract)) //when uploading 2 files , update status
                $polizza->status_id = 4;
            $polizza->save();

            // send email to Supervisor
            $Supervisor = User::where('id', 2)->first();

            if ($Supervisor) {
                // $Supervisor->notify(new UserInvitationNotification($polizza, 'check_pdfs'));    
                //$invitation_notification = new \UserInvitationNotification($polizza, 'check_pdfs');
                $Supervisor = User::where('id', 2)->first();

                // $Supervisor->notify($invitation_notification);    
            } else {
                // abort(403, 'Ooh, Can not find Supervisor. Please check it out.');
                flash(trans('core::core.can_not_find_supervisor'))->error();
            }
            flash(trans('PolizzaCar::PolizzaCar.uploaded_doc_success'))->success();
            $return['msg'] = trans('PolizzaCar::PolizzaCar.uploaded_doc_success');

            $Supervisor = User::where('id', 2)->first();

            $messaggio = 'Polizza n. '. $polizza->id .' - '. $polizza->company_name .' documenti caricati da verificare.';

            $placeholder = new NotificationPlaceholder();
            $placeholder->setContent($messaggio);
            $placeholder->setRecipient($Supervisor);
            $placeholder->setColor('bg-orange');
                    $placeholder->setIcon('playlist_add_check');
                    $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));

            // $Supervisor->notify(new GenericNotification($placeholder));

            $user = User::where('email', $polizza->company_email)->first();
    
                $messaggio = 'Polizza n. '. $polizza->id .' - '. $polizza->company_name .' documenti caricati con successo.';
    
                $placeholder = new NotificationPlaceholder();
                $placeholder->setContent($messaggio);
                $placeholder->setRecipient($user);
                    $placeholder->setColor('bg-orange');
                    $placeholder->setIcon('playlist_add_check');
                    $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));

                // $user->notify(new GenericNotification($placeholder));


            $return['status'] = 'ok';
            
        }
        
        return response()->json(
           [
                 'data' => $return
           ]
        );

        // return redirect()->route('polizzacar.polizzacar.show',$polizza->id);

        
    }

    public function showPdfFile($pdfFile)
    {

        if ($this->permissions['browse'] != '' && !\Auth::user()->hasPermissionTo($this->permissions['browse'])) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        // $fullPathToFile = storage_path('pdf/7_Preventivo_CAR_CHUBB_ITALGAS_0719.pdf');
        
        // $fullPathToFile = storage_path('signed_pdf/' . $pdfFile );

        $fullPathToFile = storage_path(env('UPLOAD_URL').'/' . $pdfFile );

        if (file_exists($fullPathToFile)) {
            $pdf_full = new PDFMerger();
            $pdf_full->addPDF($fullPathToFile, 'all');
            $pdf_full->merge('stream', $pdfFile); 
        } else {
            abort('404');
        }

        
    }

    /**
     * Function invoked after entity store
     * @param $request
     * @param $entity
     */
    public function afterStore($request, &$entity)
    {
        $user = auth()->user()->id;
        $users = auth()->user();

        if(isset($users->groups->first()->id)) {
            $group = $users->groups->first()->id;
            $entity->group_id = $group;
        }

        $entity->status_id = 2;
        
    
        $entity->save();

        $polizza = PolizzaCar::find($entity->id);
        
        activity()
            ->performedOn($polizza)
            ->log('Polizza Creata');
            
        $Supervisor = User::where('id','=','2')->first();
        //dd($entity->owner);

        $messaggio = 'Preventivo n. '. $entity->id .' - '. $entity->company_name .' creato. In attesa di approvazione.';

        $placeholder = new NotificationPlaceholder();
        $placeholder->setContent($messaggio);
        $placeholder->setColor('bg-teal');
        $placeholder->setIcon('how_to_reg');
        $placeholder->setUrl(route('polizzacar.polizzacar.show', $polizza));

        $placeholder->setRecipient($Supervisor);

        // $Supervisor->notify(new GenericNotification($placeholder));

        $polizza = PolizzaCar::find($entity->id);

        $procurement = PolizzaCarProcurement::where('id', $entity->procurement_id)->first();
        if ($procurement) {
            $procurement->update([
                'insurance_policy'      => $polizza->id, // mark as used so it can't be reused
            ]);
        }

        if ($Supervisor) {
         //   $Supervisor->notify(new UserInvitationNotification($polizza, 'approve'));    
        } else {
            flash(trans('core::core.can_not_find_supervisor'))->error();
        }

    }

    public function signatureDocusign($identifier)
    {
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

        $polizza = PolizzaCar::where('id', $entity->id)->first();
        $envelope_id = $polizza->envelope_id;
        
        $client = new \DocuSign\Rest\Client([
			'username'       => env('DOCUSIGN_USERNAME'),
			'password'       => env('DOCUSIGN_PASSWORD'),
            'integrator_key' => env('DOCUSIGN_INTEGRATOR_KEY'),
            //'account_id'     => env('DOCUSIGN_ACCOUNT_ID')
        ]);

        // dd($client->envelopeDefinition([]));
        
        $fullPathToFile = storage_path('pdf/8_Certificato_CAR_CHUBB_ITALGAS_0719.pdf');
        $b64Doc = chunk_split(base64_encode(file_get_contents($fullPathToFile)));
      
       /*$envelopeDefinition = $client->envelopeDefinition([
			'status'        => 'sent',
			'email_subject' => 'DocuSign Rest Client - Sign this doc',
			'email_blurb'   => 'Please Sign My Test Document',
			'recipients'    => $client->recipients([
				'signers' => [
					$client->signer([
						'name' => $entity->company_name,
                        'email' => $entity->company_email,
						'recipient_id' => 1,
						'tabs'         => [
							'sign_here_tabs' => [
								$client->signHere([
									'x_position'   => '100',
									'y_position'   => '100',
									'document_id'  => '1',
									'page_number'  => '1',
									'recipient_id' => '1'
                                    ])
                                ]
                            ]
                        ])
                    ]
                ]),
                'documents'     => [
                    $client->document([
                        'document_base64' => base64_encode(file_get_contents($fullPathToFile)),
                        'name'            => 'DOCUMENT_NAME',
                        'document_id'     => 1,
                        'file_extension' => 'pdf'
                    ])
                ]
        ]); */
        
        // $envelopeSummary = $client->envelopes->createEnvelope($envelopeDefinition);
        

        	# Step 1: Obtain your OAuth Token
        //    $accountId = env('DOCUSIGN_ACCOUNT_ID'); # represents your {ACCOUNT_ID}
        //    $basePath =  env('DOCUSIGN_HOST'); # represents demo or not
        //    $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IjY4MTg1ZmYxLTRlNTEtNGNlOS1hZjFjLTY4OTgxMjIwMzMxNyJ9.eyJUb2tlblR5cGUiOjUsIklzc3VlSW5zdGFudCI6MTU3NTQ3Nzg3MiwiZXhwIjoxNTc1NTA2NjcyLCJVc2VySWQiOiI0NzJhY2EyOC01ZTE1LTRlYTEtOTQwMC0xNzYwNjk2ZTRiM2EiLCJzaXRlaWQiOjEsInNjcCI6WyJzaWduYXR1cmUiLCJjbGljay5tYW5hZ2UiLCJvcmdhbml6YXRpb25fcmVhZCIsImdyb3VwX3JlYWQiLCJwZXJtaXNzaW9uX3JlYWQiLCJ1c2VyX3JlYWQiLCJ1c2VyX3dyaXRlIiwiYWNjb3VudF9yZWFkIiwiZG9tYWluX3JlYWQiLCJpZGVudGl0eV9wcm92aWRlcl9yZWFkIiwiZHRyLnJvb21zLnJlYWQiLCJkdHIucm9vbXMud3JpdGUiLCJkdHIuZG9jdW1lbnRzLnJlYWQiLCJkdHIuZG9jdW1lbnRzLndyaXRlIiwiZHRyLnByb2ZpbGUucmVhZCIsImR0ci5wcm9maWxlLndyaXRlIiwiZHRyLmNvbXBhbnkucmVhZCIsImR0ci5jb21wYW55LndyaXRlIl0sImF1ZCI6ImYwZjI3ZjBlLTg1N2QtNGE3MS1hNGRhLTMyY2VjYWUzYTk3OCIsImF6cCI6ImYwZjI3ZjBlLTg1N2QtNGE3MS1hNGRhLTMyY2VjYWUzYTk3OCIsImlzcyI6Imh0dHBzOi8vYWNjb3VudC1kLmRvY3VzaWduLmNvbS8iLCJzdWIiOiI0NzJhY2EyOC01ZTE1LTRlYTEtOTQwMC0xNzYwNjk2ZTRiM2EiLCJhdXRoX3RpbWUiOjE1NzU0NjYyOTksInB3aWQiOiI5NmFlZTZmMi05NmNkLTRhMDgtYjJkZS1jYjYxODYxZjBkMDkifQ.tMxTWozFg21r82iCrcnvNBqRWbKF1ufJPd9z5ECtx55cx2Xx5Bu9BiPHZU7PcPwyNDB57KIH8c6LUgnffZnHST-ACPOMdOipzDesIG6wFVoWoa9fCwErix3QXrcZPM79TVH61pUhjx0tJ9uOgsql82a2UQBEJNVjZ-jy3EsV8gVmc8sT0AQOGutSquT0zPEl2lJDib0mOJWtaWztbhIFdMlMC4b1iNqCVkqo970UFpNQa8489CdMcOuAh7XQSjWfvTWO44dsCjYalfN6uL31HJPG7YCo_nuD8Y2qHpXouUtETBgAfTaHCBYtERMM5goUaNgKC-8b9g0BMDEtqMyWEQ';
        //    $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IjY4MTg1ZmYxLTRlNTEtNGNlOS1hZjFjLTY4OTgxMjIwMzMxNyJ9.eyJUb2tlblR5cGUiOjUsIklzc3VlSW5zdGFudCI6MTU3NjA1MzI4OSwiZXhwIjoxNTc2MDgyMDg5LCJVc2VySWQiOiJlYzg5NjU1MS0zZjUzLTRiOWMtODljYi0yNzI1NmFmOWY2NmMiLCJzaXRlaWQiOjEsInNjcCI6WyJzaWduYXR1cmUiLCJjbGljay5tYW5hZ2UiLCJvcmdhbml6YXRpb25fcmVhZCIsImdyb3VwX3JlYWQiLCJwZXJtaXNzaW9uX3JlYWQiLCJ1c2VyX3JlYWQiLCJ1c2VyX3dyaXRlIiwiYWNjb3VudF9yZWFkIiwiZG9tYWluX3JlYWQiLCJpZGVudGl0eV9wcm92aWRlcl9yZWFkIiwiZHRyLnJvb21zLnJlYWQiLCJkdHIucm9vbXMud3JpdGUiLCJkdHIuZG9jdW1lbnRzLnJlYWQiLCJkdHIuZG9jdW1lbnRzLndyaXRlIiwiZHRyLnByb2ZpbGUucmVhZCIsImR0ci5wcm9maWxlLndyaXRlIiwiZHRyLmNvbXBhbnkucmVhZCIsImR0ci5jb21wYW55LndyaXRlIl0sImF1ZCI6ImYwZjI3ZjBlLTg1N2QtNGE3MS1hNGRhLTMyY2VjYWUzYTk3OCIsImF6cCI6ImYwZjI3ZjBlLTg1N2QtNGE3MS1hNGRhLTMyY2VjYWUzYTk3OCIsImlzcyI6Imh0dHBzOi8vYWNjb3VudC1kLmRvY3VzaWduLmNvbS8iLCJzdWIiOiJlYzg5NjU1MS0zZjUzLTRiOWMtODljYi0yNzI1NmFmOWY2NmMiLCJhbXIiOlsiaW50ZXJhY3RpdmUiXSwiYXV0aF90aW1lIjoxNTc2MDUzMjg2LCJwd2lkIjoiMTA2NDRhYjctY2FhNS00MGMxLWI1Y2ItZjNkM2VkNzY3YWI0In0.mTWFIdo14Fw941OSv1GMGsIJcHA8MXbmRHBP96CZy1QJCONQyW_-B_DZG96eMu_yAXooJlekWioOqMutyuo6B6usHDqyYR4jkq9dNvuRRdfy4WF_4VHmEb5Ez09wdtccsizZb61Sz_EqBEn4syRSJsEj2Nyowpyybp9Vs69gu4vr_x5yheyZJyeYVwxFEU3O3W7N_EffsN2G4eN8bgYhOYj_lJYMfcLQ8kK72OBbqsaiCgmCFdYCz4qiRBcbN3zEa4yBc63BftRguy85BVxFikgfdFi1Af6_GdTzjraikNOF_z8IP7I41T2p173hfbgs7N7Rnuof086jiyPYRb-nuA';  
            # Step 2: Construct your API Headers
        //    $config = new \DocuSign\eSign\Configuration();
        //    $config->setAccessToken($accessToken);
        //    $config->addDefaultHeader('Authorization', 'Bearer ' . $accessToken);
        //    $config->setHost($basePath);
        //    $apiClient = new \DocuSign\eSign\client\ApiClient($config);
        //    $envelopesApi = new \DocuSign\eSign\Api\EnvelopesApi($apiClient);

        #apiKeys: []
            #apiKeyPrefixes: []
            #accessToken: ""
            #username: ""
            #password: ""
            #defaultHeaders: array:1 [▶]
            #host: "https://www.docusign.net/restapi"
            #curlTimeout: 0
            #curlConnectTimeout: 0
            #userAgent: "Swagger-Codegen/2.0.1/php"
            #debug: false
            #debugFile: "php://output"
            #tempFolderPath: "/var/folders/82/m6fp3vsj38q8f_7fzxylbdrw0000gp/T"
            #sslVerification: true
            #proxyHost: null
            #proxyPort: null
            #proxyType: null
            #proxyUser: null
            #proxyPassword: null
  
        
        /* $env = new \DocuSign\eSign\Model\EnvelopeDefinition([
            'email_subject' => 'Polizza n. '. $entity->id .' - '. $entity->company_name .' in attesa di firma',
            'envelope_id_stamping' => 'true',
            'email_blurb' => 'Please sign the Polizza CAR to start the application process.',
            'status' => 'sent'
            ]);

        # Add a document
        $fullPathToFile = storage_path('pdf/8_Certificato_CAR_CHUBB_ITALGAS_0719.pdf');
        $b64Doc = chunk_split(base64_encode(file_get_contents($fullPathToFile)));
        $document1 = new \DocuSign\eSign\Model\Document([  
            'document_base64' => $b64Doc,
            'document_id' => '1'  ,
            'file_extension' => 'pdf',  
            'name' => 'Document'
            ]);
    
        $env->setDocuments(array($document1));

        # Create your signature tab
        $signHere1 = new \DocuSign\eSign\Model\SignHere([
            'name' => 'SignHereTab',
            'x_position' => 380,
            'y_position' => 650,
            'tab_label' => 'SignHereTab',
            'page_number' => '1',
            'document_id' => '1',
            # A 1- to 8-digit integer or 32-character GUID to match recipient IDs on your own systems.
            # This value is referenced in the Tabs element below to assign tabs on a per-recipient basis.
            'recipient_id' => '1' # represents your {RECIPIENT_ID}        
        ]);
                
        # Tabs are set per recipient/signer
        $signer1Tabs = new \DocuSign\eSign\Model\Tabs;
        $signer1Tabs->setSignHereTabs(array($signHere1));

        $smsAuthentication = new \DocuSign\eSign\Model\RecipientSMSAuthentication;
        $providedPhoneNumber=''; # represents your {PHONE_NUMBER}
        $smsAuthentication->setSenderProvidedNumbers(array($providedPhoneNumber));

        $signer1 = new \DocuSign\eSign\Model\Signer([
            'name' => $entity->company_name,
            'email' => $entity->company_email,
            'routing_order' => '1',
            'status' => 'created',
            'delivery_method' => 'Email',
            'recipient_id' => '1', # represents your {RECIPIENT_ID}
            'tabs' => $signer1Tabs,
            'sms_authentication' => $smsAuthentication,
            'require_id_lookup' => 'true',
            'id_check_configuration_name' => "SMS Auth $"

            // 'accessCode' => '12345',  // if access code selected
            //'clientUserId' => '1001'  // if embedded signing selected
        ]);

        $recipients = new \DocuSign\eSign\Model\Recipients;
        $recipients->setSigners(array($signer1));
        
        $env->setRecipients($recipients); */
 
        //  $envelopesApi = new \DocuSign\eSign\Api\EnvelopesApi($client);
        //  $envelopeSummary = $client->envelopes->createEnvelope($env);
        //  $results = $envelopesApi->createEnvelope($accountId, $env);
        //  $envelope_id = $results->getEnvelopeId();

         
          // if ($envelope_id == '') {

        
          $envelopeSummary = $client->envelopes->createEnvelope(
            array (
                'status' => 'sent',
                'emailSubject' => 'Polizza n. '. $entity->id .' - '. $entity->company_name .' in attesa di firma',
                'emailBlurb' => 'Please sign the Polizza CAR to start the application process.',
                'documents' => [
                    array (
                        'documentId' => '1',
                        'name' => 'Document',
                        'fileExtension' => 'pdf',
                        'documentBase64' => $b64Doc,
                    )
                ],
                'recipients' => array (
                    'signers' => [ array (
                        'tabs' => array (
                            'signHereTabs' => [
                                array (
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'xPosition' => 380,
                                    'yPosition' => 650
                                )
                            ],
                            'textTabs' => [
                                array (
                                    'name' => 'Ragione Sociale',
                                    'value' => $entity->company_name,
                                    'locked' => 'true',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'Ragione Sociale',
                                    'anchorXOffset' => '100',
                                    'anchorYOffset' => '0'
                                ),
                                array (
                                    'name' => 'CF / Partita IVA',
                                    'value' => $entity->company_vat,
                                    'locked' => 'true',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'Partita IVA',
                                    'anchorXOffset' => '80',
                                    'anchorYOffset' => '0'
                                ),
                                array (
                                    'name' => 'Certificato',
                                    'value' => $entity->id,
                                    'locked' => 'true',
                                    'tabLabel' => 'Numero Certificato',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'CERTIFICATO',
                                    'anchorXOffset' => '20',
                                    'anchorYOffset' => '15'
                                ),
                                array (
                                    'name' => 'Tipologia lavori',
                                    'value' => $entity->works_type->name,
                                    'locked' => 'true',
                                    'tabLabel' => 'Tipologia lavori',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'Tipologia lavori',
                                    'anchorXOffset' => '100',
                                    'anchorYOffset' => '0'
                                ),
                                array (
                                    'name' => 'Provincia di esecuzione',
                                    'value' => $entity->works_place_pr,
                                    'locked' => 'true',
                                    'tabLabel' => 'Provincia di esecuzione',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'Provincia di esecuzione',
                                    'anchorXOffset' => '120',
                                    'anchorYOffset' => '0'
                                ),
                                array (
                                    'name' => 'Luogo di esecuzione',
                                    'value' => $entity->works_place_city,
                                    'locked' => 'true',
                                    'tabLabel' => 'Luogo di esecuzione',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'Luogo di esecuzione',
                                    'anchorXOffset' => '120',
                                    'anchorYOffset' => '0'
                                ),
                                array (
                                    'name' => 'P1',
                                    'value' => $entity->car_p1_limit_amount,
                                    'locked' => 'true',
                                    'tabLabel' => 'Partita 1',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'Partita 1 - OPERE',
                                    'anchorXOffset' => '150',
                                    'anchorYOffset' => '0'
                                ),
                                array (
                                    'name' => 'Durata',
                                    'value' => $entity->works_duration_dd,
                                    'locked' => 'true',
                                    'tabLabel' => 'Durata',
                                    'documentId' => '1',
                                    'recipientId' => '1',
                                    'pageNumber' => '1',
                                    'anchorString' => 'DURATA',
                                    'anchorXOffset' => '120',
                                    'anchorYOffset' => '0'
                                )
                            ]
                        ),
                        'name' => $entity->company_name,
                        'email' => $entity->company_email,
                        'recipientId' => '1',
                        'recipientSignatureProviders' => [
                            array (
                            'signatureProviderName' => 'universalsignaturepen_opentrust_hash_tsp',
                            'signatureProviderOptions' => array (
                                'sms' => '+447925483427'
                            )
                        )],
                        // 'sms_authentication' => '+447925483427',
                        // 'accessCode' => '12345',  // if access code selected
                        'clientUserId' => '1001'  // if embedded signing selected
                        )
                    ]
                )
            )
        ); 

        
        
        $envelope_id = $envelopeSummary['envelope_id'];
        
    // }  
        $polizza = PolizzaCar::where('id', $entity->id)->first();
        // dd($polizza);
        $polizza->update([
            'envelope_id' => $envelope_id // mark as used so it can't be reused
        ]);

        
        $returnUrl = env('APP_URL').'/polizzacar/polizzacar/docusign/feedback/'. $polizza->id;
        
        $result = $client->envelopes->createRecipientView($envelope_id, array(
            'userName' => $polizza->company_name,
            'email' => $polizza->company_email,
            'AuthenticationMethod' => 'none',
            'clientUserId' => '1001',  // if embedded signing selected
            'returnUrl' => $returnUrl
         ));

         // dd($request->ajax());

        return ['envelope_id' => $envelope_id, 'url' => $result['url']];
    }

    public function getDocusignFeefback(Request $request, $identifier)
    {
        if ($this->permissions['browse'] != '' && !\Auth::user()->hasPermissionTo($this->permissions['browse'])) {
            flash(trans('core::core.you_dont_have_access'))->error();
            return redirect()->route($this->routes['index']);
        }

        //return response()->json(Session::all());
        $repository = $this->getRepository();

        $entity = $repository->find($identifier);

        $this->entity = $entity;

        if (empty($entity)) {
            flash(trans('core::core.entity.entity_not_found'))->error();

            return redirect(route($this->routes['index']));
        }

        switch($request['event'])
        {
            case 'signing_complete':
                {
                    $client = new \DocuSign\Rest\Client([
                        'username'       => env('DOCUSIGN_USERNAME'),
                        'password'       => env('DOCUSIGN_PASSWORD'),
                        'integrator_key' => env('DOCUSIGN_INTEGRATOR_KEY')
                    ]);

                    $polizza = PolizzaCar::where('id', $entity->id)->first();
                    //$polizza->update([
                    //    'envelope_id' => $envelope_id // mark as used so it can't be reused
                    //]);

                    $envelope_id = $polizza->envelope_id;

                    //
                    // LIST DOCUMENTS //
                    // $result = $client->envelopes->listDocuments($envelope_id,);

                    $docStream = $client->envelopes->getDocument('combined', $envelope_id);
                    // $fullPath = storage_path('signed_pdf/'. $polizza->id .'/');
                    $pdfFile = $polizza->company_name.'_Certificato_Firmato.pdf';
                    $fullPath = storage_path(env('UPLOAD_URL').'/' . $pdfFile );
                    
                    if (!\File::exists(storage_path(env('UPLOAD_URL'))))
                    {
                        \File::makeDirectory(storage_path(env('UPLOAD_URL')), 0755, true, true);
                    }

                    file_put_contents($fullPath, file_get_contents($docStream->getPathname()));
            
                    // return $docStream;
                    $polizza->update([
                        'pdf_signed_contract' => $pdfFile, // set filename to DB
                        'status' => 4
                    ]);
                    
                    flash('FIRMATO' /* trans('PolizzaCar::PolizzaCar.order_request')*/)->success();
                    // return redirect()->route('polizzacar.polizzacar.show',$polizza->id);
                    return '<script>parent.location="'.route('polizzacar.polizzacar.show',$polizza->id).'";</script>';
                    // return ['envelope_id' => $envelope_id, 'url' => $result['url']];

                    //return $request['event']. $identifier;
                }
                break;
            case 'viewing_complete':
                {
                    $client = new \DocuSign\Rest\Client([
                        'username'       => env('DOCUSIGN_USERNAME'),
                        'password'       => env('DOCUSIGN_PASSWORD'),
                        'integrator_key' => env('DOCUSIGN_INTEGRATOR_KEY')
                    ]);

                    $polizza = PolizzaCar::where('id', $entity->id)->first();
                    //$polizza->update([
                    //    'envelope_id' => $envelope_id // mark as used so it can't be reused
                    //]);

                    $envelope_id = $polizza->envelope_id;

                    //
                    // LIST DOCUMENTS //
                    // $result = $client->envelopes->listDocuments($envelope_id,);

                    $docStream = $client->envelopes->getDocument(1, $envelope_id);
                    // $fullPath = storage_path('signed_pdf/'. $polizza->id .'/');
                    $pdfFile = $polizza->company_name.env('DOCUSIGN_SUFFIX').'.'.env('DOCUSIGN_MATERIAL');
                    $fullPath = storage_path(env('UPLOAD_URL').'/' . $pdfFile );
                    
                    if (!\File::exists(storage_path(env('UPLOAD_URL'))))
                    {
                        \File::makeDirectory(storage_path(env('UPLOAD_URL')), 0755, true, true);
                    }

                    file_put_contents($fullPath, file_get_contents($docStream->getPathname()));
            
                    // return $docStream;
                    $polizza->update([
                        'pdf_signed_contract' => $pdfFile, // set filename to DB
                        'status' => 4
                    ]);
                    

                    //dd($polizza);

                    
                    flash('FIRMATO' /* trans('PolizzaCar::PolizzaCar.order_request')*/)->success();
                    
                    // return redirect()->route('polizzacar.polizzacar.show',$polizza->id);
                    

                    


                    // return ['envelope_id' => $envelope_id, 'url' => $result['url']];

                    //return $request['event']. $identifier;
                }
            break;
        }

        exit;

        
        // return Redirect::route('addmoney.paywithpaypal');
    }


   
}
