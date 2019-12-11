<?php

namespace Modules\PolizzaCar\Http\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;
use Modules\PolizzaCar\Entities\PolizzaCarCategory;
use Modules\PolizzaCar\Entities\PolizzaCarProcurement;
use Modules\PolizzaCar\Entities\PolizzaCarStatus;
use Modules\Platform\Settings\Entities\Country;
use Modules\Platform\Core\Helper\UserHelper;
use Modules\Platform\Settings\Entities\Province;
use Modules\PolizzaCar\Entities\PolizzaCarWorksType;
use Modules\PolizzaCar\Entities\PianoTariffario;

class PolizzaCarForm extends Form
{
    public function buildForm()
    {
        $this->add('date_request', 'dateType', [
            'label' => trans('PolizzaCar::PolizzaCar.form.date_request'),
            'value' => UserHelper::formatUserDate(Carbon::now()->format('Y-m-d'))
        ]);
        
        /* $this->add('status_id', 'select', [
            'choices' => PolizzaCarStatus::all()->pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.status_id'),
            'empty_value' => trans('core::core.empty_select'),
            'default_value' => '1'
        ]); */       
        $this->add('procurement_id', 'select', [
            'choices' => PolizzaCarProcurement::where('insurance_policy')->pluck('company_name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.procurement_id'),
            'empty_value' => trans('core::core.empty_select'),
        ]);
        $this->add('contract_code', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.contract_code'),
        ]);

        $this->add('company_name', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.company_name'),
        ]);

        $this->add('company_vat', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.company_vat'),
            'default_value' => '',
        ]);

        $this->add('company_email', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.company_email'),
        ]);

        $this->add('company_phone', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.company_phone'),
        ]);

        $this->add('company_address', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.company_address'),
        ]);
        $this->add('company_cap', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.company_cap'),
        ]);

        $this->add('company_city', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.company_city'),
        ]);

        $this->add('company_provincia', 'select', [
            'choices' => Province::whereIsActive(1)->pluck('name', 'abbr_prov')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.company_provincia'),
            'empty_value' => trans('core::core.empty_select')
        ]);
        $this->add('country_id', 'select', [
            'choices' => Country::whereIsActive(1)->pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.country_id'),
            'empty_value' => trans('core::core.empty_select'),
            'default_value' => 110
        ]);

        

        $this->add('works_descr', 'textarea', [
            'label' => trans('PolizzaCar::PolizzaCar.form.works_descr'),
        ]);

        $this->add('works_type_details', 'select', [
            'choices' => PolizzaCarWorksType::pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.works_type_details'),
            'empty_value' => trans('core::core.empty_select')
        ]);
        $this->add('works_duration_mm', 'select', [
            'label' => trans('PolizzaCar::PolizzaCar.form.works_duration_mm'),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'choices' => ['24' => '< =24 mesi', '2' => '> 24 mesi e <= 36 mesi', '3' => '> 36 mesi'],
            'empty_value' => trans('core::core.empty_select'),
        ]);
        $this->add('works_duration_dd', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.works_duration_dd'),
        ]);
        $this->add('risk_id', 'select', [
            'label' => trans('PolizzaCar::PolizzaCar.form.risk_id'),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'choices' => PianoTariffario::pluck('name', 'id')->toArray(),
            'empty_value' => trans('core::core.empty_select'),
        ]);
        $this->add('coeff_tariffa', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.coeff_tariffa'),
            
        ]);
        $this->add('tax_rate', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.tax_rate'),
        ]);
        $this->add('works_place_city', 'select', [
            'choices' => Province::whereIsActive(1)->pluck('name', 'name')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.works_place_city'),
            'empty_value' => trans('core::core.empty_select')
        ]);
        $this->add('works_place_pr', 'select', [
            'choices' => Province::whereIsActive(1)->pluck('name', 'abbr_prov')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.works_place_pr'),
            'empty_value' => trans('core::core.empty_select')
        ]);
        $this->add('sezione_a', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.sezione_a'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('partita_1', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.partita_1'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('car_p1_limit_amount', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.car_p1_limit_amount'),
            'attr' => ['class' => 'form-control calc'],
        ]);
        $this->add('car_p1_premium_gross', 'text', [           
            'attr' => ['class' => 'form-control premium_gross', 'readonly' => 'readonly'],
            'label' => trans('PolizzaCar::PolizzaCar.form.car_premium_gross'),
        ]);
        $this->add('car_p1_premium_net', 'text', [
            'attr' => ['class' => 'form-control premium_net', 'readonly' => 'readonly'],  
            'label' => trans('PolizzaCar::PolizzaCar.form.car_premium_net'),
        ]);
        
        $this->add('partita_2', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.partita_2'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('car_p2_limit_amount', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.car_p2_limit_amount'),
            'attr' => ['class' => 'form-control calc'],
        ]);
        $this->add('car_p2_premium_gross', 'text', [
            'attr' => ['class' => 'form-control premium_gross', 'readonly' => 'readonly'],
            'label' => trans('PolizzaCar::PolizzaCar.form.car_premium_gross'),
        ]);
        $this->add('car_p2_premium_net', 'text', [
            'attr' => ['class' => 'form-control premium_net', 'readonly' => 'readonly'],
            'label' => trans('PolizzaCar::PolizzaCar.form.car_premium_net'),
        ]);

        $this->add('partita_3', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.partita_3'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('car_p3_limit_amount', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.car_p3_limit_amount'),
            'attr' => ['class' => 'form-control calc'],
        ]);
        $this->add('car_p3_premium_gross', 'text', [
            'attr' => ['class' => 'form-control premium_gross', 'readonly' => 'readonly'],
            'label' => trans('PolizzaCar::PolizzaCar.form.car_premium_gross'),
        ]);
        $this->add('car_p3_premium_net', 'text', [
            'attr' => ['class' => 'form-control premium_net', 'readonly' => 'readonly'],  
            'label' => trans('PolizzaCar::PolizzaCar.form.car_premium_net'),
        ]);
        $this->add('total_labels', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.total_labels'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('total_gross', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.total_gross'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('total_net', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.total_net'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('partite_total', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.partite_total'),
            //'attr' => ['class' => 'form-control step']
        ]);
        $this->add('sezione_b', 'static', [
            'wrapper' => ['class' => 'section_title'],
            'label' => trans('PolizzaCar::PolizzaCar.form.sezione_b'),
            //'attr' => ['class' => 'form-control step']
        ]);
        //$this->add('car_civil_liability', 'static', [
        //    'wrapper' => ['class' => 'form-group form-line focused'],
            //'label_show' => false,
        //    'attr' => ['class' => 'form-control sezione_b_max'],  
        //    'label' => trans('PolizzaCar::PolizzaCar.form.sezione_b_max'),
        //    'default_value' => '€ 5.000.000,00'
        //]);
        
        $this->add('sezione_b_terms', 'static', [
            'wrapper' => ['class' => 'form-group form-line focused'],
            //'label_show' => false,
            'attr' => ['class' => 'form-control sezione_b_terms'],  
            'label' => trans('PolizzaCar::PolizzaCar.form.sezione_b_terms'),
            'default_value' => 'sempre compresa'
        ]);
        

        
        
    
        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect policysave']
        ]);
    }
}
