<?php

namespace Modules\PolizzaCar\Service;

// use App\FtpLog;
// use App\User;

use Modules\PolizzaCar\Entities\PolizzaCar;
use Modules\PolizzaCar\Entities\PolizzaCarStatus;
use Modules\PolizzaCar\Entities\PolizzaCarProcurement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CsvExportService
{

    public function exportCsv()
    {
        $Facility_Code = config('vaance.facility_code');

        $columnTitles = [
            'Facility_Code',
            'PolicyHolder_Name',
            'PolicyHolder_Address',
            'PolicyHolder_City',
            'PolicyHolder_PostalCode',
            'PolicyHolder_PR',
            'PolicyHolder_VAT',
            'CVG_Type',
            'CVG_DecennialLiability',
            'Contract_Code',
            'WorksType',
            'WorksType_details',
            'WorksDescription',
            'WorksDuration_dd',
            'WorksDuration_mm',
            'WorksPlace_City',
            'WorksPlace_PR',
            'WorksPlace_Region',
            /* 'AddIns1_Name',
            'AddIns1_Address',
            'AddIns1_City',
            'AddIns1_PostalCode',
            'AddIns1_PR',
            'AddIns1_VAT',
            'AddIns2_Name',
            'AddIns2_Address',
            'AddIns2_City',
            'AddIns2_PostalCode',
            'AddIns2_PR',
            'AddIns2_VAT',
            'AddIns3_Name',
            'AddIns3_Address',
            'AddIns3_City',
            'AddIns3_PostalCode',
            'AddIns3_PR',
            'AddIns3_VAT',*/
            'CAR_P1_LimitAmount',
            'CAR_P2_LimitAmount',
            'CAR_P3_LimitAmount',
            /* 'CAR_RCT_LimitAmount',
            'DL_P1_LimitAmount',
            'DL_P2_LimitAmount',
            'DL_P3_LimitAmount',
            'DL_GL_LimitAmount',
            'RCT_LimitAmount',
            'RCO_LimitAmount',*/
            'PolicyEffect_date',
            'PolicyExpire_date',
            'CAR_rateoImponibile', 
            'CAR_rateoTasse',
            'CAR_rateoLordo',
            'Rate_CAR_%',
            /*'RCT/O_rateoImponibile',
            'RCT/O_rateoTasse',
            'RCT/O_rateoLordo'*/
        ];

        $output = "";
        foreach ($columnTitles as $columnTitle) {
            $output .= $columnTitle . ";";
        }
        $output = substr($output, 0, -1) . "\r\n";

        $fileDate = now();
        $dateFrom = now();
        if (now()->format('H:i') >= config('vaance.export_time')) { // tomorrow's file
            $fileDate->addDay();
        } else {
            $dateFrom->subDay();
        }
        $filename = $Facility_Code . '_' . $fileDate->format('Ymd');
        $timeFrom = $dateFrom->toDateString() . ' ' . config('vaance.export_time');
        
        $polizze = PolizzaCar::withTrashed()
            ->where(function ($q) use ($timeFrom) {
                return $q->where('created_at', '>=', $timeFrom)
                    ->orWhere('updated_at', '>=', $timeFrom)
                    ->orWhere('deleted_at', '>=', $timeFrom);
            })
            ->whereHas('status', function ($q) {
                return $q->where('id', 5); // polizze waiting to be sent
            })
            ->get();

        foreach ($polizze as $polizza) {
            $status = "A";
            if ($polizza->updated_at != $polizza->created_at) {
                $status = "M";
            }
            if ($polizza->insurance_start_date_changed_at) {
                $status = "R";
            }
            if ($polizza->deleted_at || $polizza->insurance_stop_request) {
                $status = "E";
            }
            if ($polizza->insurance_expire_date) {
                if (Carbon::createFromFormat('d/m/Y', $polizza->insurance_expire_date)->format('Y-m-d') >= '2020-10-01') {
                    $status = 'R';
                }
            }

            $output .= $Facility_Code . ";";
            $output .= $polizza->company_name . ";"; // PolicyHolder_Name
            $output .= $polizza->company_address . ";"; //PolicyHolder_Address
            $output .= $polizza->company_city . ";"; // PolicyHolder_City
            $output .= $polizza->company_cap . ";"; // PolicyHolder_PostalCode
            $output .= $polizza->company_provincia . ";"; // PolicyHolder_PR
            $output .= $polizza->company_vat . ";"; // PolicyHolder_VAT
            $output .= '0' . ";"; // CVG_Type -> CVG_Type per Polizza CAR sempre 0
            $output .= $polizza->cvg_decennial_liability . ";"; // CVG_DecennialLiability
            $output .= $polizza->contract_code . ";"; // Contract_Code
            $output .= '3' . ";"; // WorksType -> sempre 3 Opere e Utilities
            $output .= $polizza->works_type_details . ";"; // WorksType_details
            $output .= $polizza->works_descr . ";"; // WorksDescription
            $output .= $polizza->works_duration_dd . ";"; // WorksDuration_dd
            $output .= $polizza->works_duration_mm . ";"; // WorksDuration_mm
            $output .= $polizza->works_place_city . ";"; // WorksPlace_City
            $output .= $polizza->works_place_pr . ";"; // WorksPlace_PR
            $output .= $polizza->works_place_region . ";"; // WorksPlace_Region

            $output .= $polizza->car_p1_limit_amount . ";"; // CAR_P1_LimitAmount
            $output .= $polizza->car_p2_limit_amount . ";"; // CAR_P2_LimitAmount
            $output .= $polizza->car_p3_limit_amount . ";"; // CAR_P3_LimitAmount

            $output .= $polizza->policy_effect_date . ";"; // PolicyEffect_date
            $output .= $polizza->policy_expire_date . ";"; // PolicyExpire_date

            $output .= $polizza->car_rateo_imponibile . ";"; // CAR_rateoImponibile
            $output .= $polizza->car_rateo_tasse . ";"; // CAR_rateoTasse
            $output .= $polizza->car_rateo_lordo . ";"; // CAR_rateoLordo

            $output .= $polizza->car_tax_rate . ";"; // Rate_CAR_%

        // non usati per CAR - WS CHUBB
            /* 'AddIns1_Name',
            'AddIns1_Address',
            'AddIns1_City',
            'AddIns1_PostalCode',
            'AddIns1_PR',
            'AddIns1_VAT',
            'AddIns2_Name',
            'AddIns2_Address',
            'AddIns2_City',
            'AddIns2_PostalCode',
            'AddIns2_PR',
            'AddIns2_VAT',
            'AddIns3_Name',
            'AddIns3_Address',
            'AddIns3_City',
            'AddIns3_PostalCode',
            'AddIns3_PR',
            'AddIns3_VAT',
            'CAR_RCT_LimitAmount',
            'DL_P1_LimitAmount',
            'DL_P2_LimitAmount',
            'DL_P3_LimitAmount',
            'DL_GL_LimitAmount',
            'RCT_LimitAmount',
            'RCO_LimitAmount',
            'RCT/O_rateoImponibile',
            'RCT/O_rateoTasse',
            'RCT/O_rateoLordo'*/
        /////
        
            $output .= $polizza->date_request . ";" . $status . "\r\n";
        }

        Storage::disk('exports')->put($filename . '.csv', $output);

        return true;
    }

    public function uploadToFTP()
    {
        $filename = config('vaance.facility_code') . '_' . date('Ymd') . '.csv';
        $filePath = storage_path('app/exports/' . $filename);

        $rowsAmount = 0;

        try {
            if (!file_exists($filePath)) {
                FtpLog::create([
                    'filename'      => $filename,
                    'success'       => 0,
                    'error_message' => 'Nothing to upload: file ' . $filename . ' not found on the server',
                ]);

                return false;
            }

            $reader     = new \SpreadsheetReader($filePath);
            foreach ($reader as $row) {
                $rowsAmount++;
            }

            // Not counting header row
            if ($rowsAmount > 0) {
                $rowsAmount--;
            }

            Storage::disk('ftp')->put($filename, fopen($filePath, 'r+'));
        } catch (\Exception $e) {
            FtpLog::create([
                'filename'      => $filename,
                'rows_amount'   => $rowsAmount,
                'success'       => 0,
                'error_message' => $e->getMessage(),
            ]);

            return false;
        }

        // Success!
        FtpLog::create([
            'filename'      => $filename,
            'rows_amount'   => $rowsAmount,
            'success'       => 1,
        ]);

        return true;
    }

}