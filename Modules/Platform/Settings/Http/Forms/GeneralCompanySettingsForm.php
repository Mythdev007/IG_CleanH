<?php

namespace Modules\Platform\Settings\Http\Forms;

use Kris\LaravelFormBuilder\Form;

/**
 * Class GeneralCompanySettingsForm
 * @package Modules\Platform\Settings\Http\Forms
 */
class GeneralCompanySettingsForm extends Form
{
    public function buildForm()
    {

        $this->add('s_email_notify_host', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_host'),
        ]);
        $this->add('s_email_notify_port', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_port'),
        ]);
        $this->add('s_email_notify_username', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_username'),
        ]);
        $this->add('s_email_notify_password', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_password'),
        ]);
        $this->add('s_email_notify_encryption', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_encryption'),
        ]);
        $this->add('s_email_notify_mail_from_address', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_mail_from_address'),
        ]);
        $this->add('s_email_notify_mail_from_name', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_mail_from_name'),
        ]);

        try {

            if ($this->model != null && isset($this->model['s_email_notify_host'])) {
                $this->add('send_test_email', 'button', [
                    'label' => 'Send Test Email',
                    'attr' => ['id'=>'send_test_email','class' => 'btn btn-danger m-t-15 m-r-15 waves-effect pull-right general-config-send-test-email'],

                ]);
            }else{
                $this->add('send_test_email','hidden');
            }
        }catch (\Exception $exception){

        }

        $this->add('s_email_notify_content_welcome_text', 'static', [
            'tag' => 'div', // Tag to be used for holding static data,
            'attr' => ['class' => 'form-control-static'], // This is the default
            'label' => trans('settings::general_company_settings.form.s_email_notify_content_welcome'),
            'value' => trans('settings::general_company_settings.form.s_email_notify_content_welcome_description'),
        ]);

        $this->add('s_email_notify_content_welcome_title', 'text', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_content_welcome_title'),
        ]);

        $this->add('s_email_notify_content_welcome', 'wyswig', [
            'label' => trans('settings::general_company_settings.form.s_email_notify_content_welcome'),
        ]);






        $this->add('submit', 'submit', [
            'label' => trans('settings::general_company_settings.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
