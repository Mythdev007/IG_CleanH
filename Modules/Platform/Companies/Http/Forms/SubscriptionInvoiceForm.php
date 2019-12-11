<?php

namespace Modules\Platform\Companies\Http\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Companies\Entities\CompanyPlan;

/**
 * Class SubscriptionInvoiceForm
 * @package Modules\Platform\Companies\Http\Forms
 */
class SubscriptionInvoiceForm extends Form
{
    public function buildForm()
    {
        $this->add('invoice_number', 'text', [
            'label' => trans('companies::subscription_invoice.form.invoice_number'),
        ]);
        $this->add('product_name', 'text', [
            'label' => trans('companies::subscription_invoice.form.product_name'),
        ]);
        $this->add('invoice_date', 'dateType', [
            'label' => trans('companies::subscription_invoice.form.invoice_date'),
        ]);

        $this->add('invoice_from', 'textarea', [
            'label' => trans('companies::subscription_invoice.form.invoice_from'),
        ]);
        $this->add('invoice_to', 'textarea', [
            'label' => trans('companies::subscription_invoice.form.invoice_to'),
        ]);
        $this->add('terms_and_cond', 'textarea', [
            'label' => trans('companies::subscription_invoice.form.terms_and_cond'),
        ]);
        $this->add('notes', 'textarea', [
            'label' => trans('companies::subscription_invoice.form.notes'),
        ]);
        $this->add('price', 'number', [
            'label' => trans('companies::subscription_invoice.form.price'),
        ]);
        $this->add('tax_rate', 'number', [
            'label' => trans('companies::subscription_invoice.form.tax_rate'),
        ]);
        $this->add('tax_description', 'text', [
            'label' => trans('companies::subscription_invoice.form.tax_description'),
        ]);
        $this->add('currency_name', 'text', [
            'label' => trans('companies::subscription_invoice.form.currency_name'),
        ]);
        $this->add('provider_name', 'text', [
            'label' => trans('companies::subscription_invoice.form.provider_name'),
        ]);
        $this->add('provider_id', 'text', [
            'label' => trans('companies::subscription_invoice.form.provider_id'),
        ]);
        $this->add('provider_status', 'text', [
            'label' => trans('companies::subscription_invoice.form.provider_status'),
        ]);
        $this->add('plan_name', 'text', [
            'label' => trans('companies::subscription_invoice.form.plan_name'),
        ]);
        $this->add('period', 'text', [
            'label' => trans('companies::subscription_invoice.form.period'),
        ]);

        $this->add('status', 'checkbox', [
            'label' => trans('companies::subscription_invoice.form.status'),
        ]);

        $this->add('company_id', 'select', [
            'choices' => Company::all()->pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('companies::subscription_invoice.form.company_id'),
            'empty_value' => trans('core::core.empty_select')
        ]);


        $this->add('submit', 'submit', [
            'label' => trans('companies::subscription_invoice.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
