<?php

namespace Modules\Campaigns\Http\Forms;

use Illuminate\Support\Facades\App;
use Kris\LaravelFormBuilder\Form;
use Modules\Accounts\Entities\Account;
use Modules\Contacts\Entities\Contact;
use Modules\Leads\Entities\Lead;

/**
 * Class EmailCampaignForm
 * @package Modules\Campaigns\Http\Forms
 */
class EmailCampaignForm extends Form
{
    public function buildForm()
    {
        $this->add('subject', 'text', [
            'label' => trans('sentemails::sentemails.form.subject'),
            'attr' => ['class' => 'form-control email_subject'],
            'note' => trans('campaigns::campaigns.email_campaign_info')
        ]);

        $contactNote = '';
        $leadNote = '';
        $accountNote = '';

        try {

            $entity = App::make(Contact::class)->first();
            if($entity) {
                $array = $entity->toArray();
                unset($array['company_id']);

                $contactNote = implode(", ", array_map(function ($string) {
                    return '"{{' . $string . '}}"';
                }, array_keys($array)));
            }else{
                $contactNote = trans('campaigns::campaigns.no_contacts_in_campaign') ;
            }

        } catch (\Exception $exception) {

        }

        try {

            $entity = App::make(Lead::class)->first();
            if($entity) {
                $array = $entity->toArray();
                unset($array['company_id']);

                $leadNote = implode(", ", array_map(function ($string) {
                    return '"{{' . $string . '}}"';
                }, array_keys($array)));
            }else{
                $leadNote = trans('campaigns::campaigns.no_leads_in_campaign') ;
            }

        } catch (\Exception $exception) {

        }

        try {

            $entity = App::make(Account::class)->first();
            if($entity) {
                $array = $entity->toArray();
                unset($array['company_id']);

                $accountNote = implode(", ", array_map(function ($string) {
                    return '"{{' . $string . '}}"';
                }, array_keys($array)));
            }else{
                $accountNote = trans('campaigns::campaigns.no_accounts_in_campaign') ;
            }

        } catch (\Exception $exception) {

        }

        $this->add('body', 'wyswig', [
            'label' => trans('sentemails::sentemails.form.body'),
            'attr' => ['class' => 'summernote email_body'],
            'additional_button' => [
                'text' => trans('sentemails::sentemails.choose_template'),
                'options' => [
                    'class' => 'btn btn-primary btn-sm m-b-5 search-relation-button',
                    'type' => 'button',
                    'data-route' => route('settings.email_templates.index', ['mode' => 'modal', 'customTableClass' => 'chooseEmailTemplate']),
                    'data-modal-title' => trans('sentemails::sentemails.choose_template')
                ],
            ],
            'note' => '<b>' . trans('campaigns::campaigns.leads') . '</b>: ' . $leadNote . '<br /><br /><b>' . trans('campaigns::campaigns.contacts') . '</b>: ' . $contactNote . '<br /><br /><b>' . trans('campaigns::campaigns.accounts') . '</b>: ' . $accountNote,
        ]);

        $this->add('email_host', 'text', [
            'label' => trans('campaigns::campaigns.form.email_host'),
        ]);
        $this->add('email_port', 'number', [
            'label' => trans('campaigns::campaigns.form.email_port'),
        ]);
        $this->add('email_username', 'text', [
            'label' => trans('campaigns::campaigns.form.email_username'),
        ]);
        $this->add('email_password', 'text', [
            'label' => trans('campaigns::campaigns.form.email_password'),
        ]);
        $this->add('email_encryption', 'text', [
            'label' => trans('campaigns::campaigns.form.email_encryption'),
        ]);
        $this->add('email_from_address', 'text', [
            'label' => trans('campaigns::campaigns.form.email_from_address'),
        ]);
        $this->add('email_from_name', 'text', [
            'label' => trans('campaigns::campaigns.form.email_from_name'),
        ]);
        $this->add('test_mode', 'checkbox', [
            'label' => trans('campaigns::campaigns.form.test_mode'),
            'removeFromMassUpdate' => true,
        ]);
        $this->add('email_test', 'text', [
            'label' => trans('campaigns::campaigns.form.email_test'),
        ]);


        $this->add('submit', 'submit', [
            'label' => trans('sentemails::sentemails.form.prepare'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);

    }

}
