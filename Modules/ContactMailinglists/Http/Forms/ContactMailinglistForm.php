<?php

namespace Modules\ContactMailinglists\Http\Forms;


use Kris\LaravelFormBuilder\Form;
use Modules\Contacts\Entities\Contact;
use Modules\ContactEmails\Entities\ContactEmail;
use Modules\ContactMailinglists\Entities\MailinglistDict;


class ContactMailinglistForm extends Form
{
    public function buildForm()
    {

        $this->add('mailinglist_id', 'select', [
            'label' => trans('contactmailinglists::contactmailinglists.form.mailinglist'),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'choices' => MailinglistDict::all()->sortBy("name")->pluck('name', 'id')->toArray(),
            'empty_value' => trans('core::core.empty_select')
        ]);

        $this->add('subscribe_ip', 'text', [
            'label' => trans('contactmailinglists::contactmailinglists.form.subscribe_ip'),
        ]);

        $contact_id =0;
        if ( is_array($this->model) ) {
            if (array_key_exists('contact_id', $this->model) ) {
                $contact_id = $this->model['contact_id'];
            }
        } else {
            $contact_id = $this->model->contact_id;
        }

        $choises =[];
        if ($contact_id) {
            $contact = Contact::where('id', '=', $contact_id)->first();
            $choises = $contact->contactEmails->pluck('email', 'id')->toArray();
        }

        $this->add('subscribe_email_id', 'select', [
            'label' => trans('contactmailinglists::contactmailinglists.form.subscribe_email_id'),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'choices' => $choises,
            'empty_value' => trans('core::core.empty_select')
        ]);

        $this->add('subscribe_date', 'dateType', [
            'label' => trans('contactmailinglists::contactmailinglists.form.joined_date'),
        ]);

        $this->add('unsubscribe_date', 'dateType', [
            'label' => trans('contactmailinglists::contactmailinglists.form.left_date'),
        ]);


        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);

    }

}
