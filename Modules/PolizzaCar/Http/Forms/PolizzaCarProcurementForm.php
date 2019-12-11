<?php

namespace Modules\PolizzaCar\Http\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Platform\Settings\Entities\Country;
use Modules\Platform\Core\Helper\UserHelper;
use Modules\Platform\Settings\Entities\Province;
use Modules\PolizzaCar\Entities\PolizzaCarWorksType;

class PolizzaCarProcurementForm extends Form
{
    public function buildForm()
    { 
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
            'default_value' => '126'
        ]);
        $this->add('subject_procurement', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.subject_procurement'),
        ]);

        $this->add('works_type_details', 'select', [
            'choices' => PolizzaCarWorksType::pluck('name', 'name')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('PolizzaCar::PolizzaCar.form.works_type_details'),
            'empty_value' => trans('core::core.empty_select')
        ]);
        $this->add('works_duration_mm', 'select', [
            'label' => trans('PolizzaCar::PolizzaCar.form.works_duration_mm'),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'choices' => ['24' => '24 mesi', '36' => '36 mesi'],
            'empty_value' => trans('core::core.empty_select'),
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
        $this->add('procurement_total', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.procurement_total'),
            'attr' => ['class' => 'form-control money-euro'],    
        ]);
       
        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
