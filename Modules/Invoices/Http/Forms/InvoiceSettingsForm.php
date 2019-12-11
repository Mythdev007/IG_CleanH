<?php

namespace Modules\Invoices\Http\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Platform\Settings\Entities\Country;

/**
 * Class InvoiceSettingsForm
 * @package Modules\Invoices\Http\Forms
 */
class InvoiceSettingsForm extends Form
{
    public function buildForm()
    {

        $this->add('s_invoice_prefix', 'text', [
            'label' => trans('invoices::invoices.invoices_settings.invoice_prefix'),
            'default_value' => 'INV-'
        ]);

        $this->add('s_invoice_increment', 'number', [
            'label' => trans('invoices::invoices.invoices_settings.next_invoice_number'),
            'default_value' => 1
        ]);

        $this->add('s_invoice_use_increment', 'checkbox', [
            'label' => trans('invoices::invoices.invoices_settings.enable_increment'),
        ]);

        $this->add('s_invoice_due_days', 'number', [
            'label' => trans('invoices::invoices.invoices_settings.default_due_days'),
        ]);

        $this->add('submit', 'submit', [
            'label' => trans('settings::company_settings.update_settings'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
