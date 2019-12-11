<?php

namespace Modules\Platform\Companies\Http\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Platform\Settings\Entities\Country;

/**
 * Class BillingCompanySettingsForm
 * @package Modules\Platform\Companies\Http\Forms
 */
class SubscriptionSettingsForm extends Form
{
    public function buildForm()
    {

        $this->add('s_subscription_paypal', 'checkbox', [
            'label' => trans('companies::subscription_settings.form.enable_paypal'),
        ]);
        $this->add('s_subscription_stripe', 'checkbox', [
            'label' => trans('companies::subscription_settings.form.enable_stripe'),
        ]);
        $this->add('s_subscription_cash', 'checkbox', [
            'label' => trans('companies::subscription_settings.form.enable_cash'),
        ]);

        $this->add('s_subscription_invoice_from', 'textarea', [
            'label' => trans('companies::subscription_settings.form.invoice_from'),
            'note' => 'Your company data'
        ]);

        $this->add('s_subscription_terms_and_cond', 'textarea', [
            'label' => trans('companies::subscription_settings.form.terms_and_cond'),
        ]);

        $this->add('s_subscription_notes', 'textarea', [
            'label' => trans('companies::subscription_settings.form.notes'),
        ]);

        $this->add('submit', 'submit', [
            'label' => trans('companies::subscription_settings.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
