<?php

namespace Modules\Platform\Companies\Http\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Platform\Settings\Entities\Currency;
use Modules\Platform\Settings\Entities\SubscriptionCurrency;

/**
 * Class CompanyPlanForm
 * @package Modules\Platform\Companies\Http\Forms
 */
class CompanyPlanForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => trans('companies::companyPlans.form.name'),
        ]);

        $this->add('api_name', 'text', [
            'label' => trans('companies::companyPlans.form.api_name'),
        ]);
        $this->add('is_free', 'checkbox', [
            'label' => trans('companies::companyPlans.form.is_free'),
        ]);
        $this->add('is_active', 'checkbox', [
            'label' => trans('companies::companyPlans.form.is_active'),
        ]);
        $this->add('color', 'simpleColorPicker', [
            'label' => trans('companies::companyPlans.form.color'),
            'default_value' => '#9E9E9E'
        ]);


        $this->add('featured', 'checkbox', [
            'label' => trans('companies::companyPlans.form.featured'),
        ]);
        $this->add('price', 'number', [
            'label' => trans('companies::companyPlans.form.price'),
        ]);


        $this->add('period', 'select', [
            'choices' =>
                [
                    'month' => 'Month',
                    'year'  => 'Year',
                ],

            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('companies::companyPlans.form.period'),

        ]);

        $this->add('tax_rate', 'number', [
            'label' => trans('companies::companyPlans.form.tax_rate'),
        ]);

        $this->add('tax_name', 'text', [
            'label' => trans('companies::companyPlans.form.tax_name'),
        ]);

        $this->add('teams_limit', 'number', [
            'label' => trans('companies::companyPlans.form.teams_limit'),
        ]);
        $this->add('storage_limit', 'number', [
            'label' => trans('companies::companyPlans.form.storage_limit'),
        ]);

        $this->add('orderby', 'number', [
            'label' => trans('companies::companyPlans.form.orderby'),
        ]);

        $this->add('currency_id', 'select', [
            'choices' => SubscriptionCurrency::all()->pluck('code', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('companies::companyPlans.form.currency_id'),
            'empty_value' => trans('core::core.empty_select')
        ]);

        $this->add('features_list', 'textarea', [
            'label' => trans('companies::companyPlans.form.features_list'),
        ]);

        $this->add('description', 'textarea', [
            'label' => trans('companies::companyPlans.form.description'),
        ]);

        $this->add('submit', 'submit', [
            'label' => trans('companies::companyPlans.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
