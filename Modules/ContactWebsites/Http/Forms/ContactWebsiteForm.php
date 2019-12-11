<?php

namespace Modules\ContactWebsites\Http\Forms;


use Kris\LaravelFormBuilder\Form;
use Modules\Contacts\Entities\Contact;
use Modules\ContactWebsites\Entities\WebsiteTypes;


class ContactWebsiteForm extends Form
{
    public function buildForm()
    {

        $this->add('url', 'text', [
            'label' => trans('contactwebsites::contactwebsites.form.url'),
        ]);

        $this->add('is_default', 'checkbox', [
            'label' => trans('contactwebsites::contactwebsites.form.is_default'),
        ]);


        $this->add('is_active', 'checkbox', [
            'label' => trans('contactwebsites::contactwebsites.form.is_active'),
        ]);

        $this->add('type_id', 'select', [
            'choices' => WebsiteTypes::all()->pluck('name', 'id')->toArray(),
            'attr' => ['class' => 'select2 pmd-select2 form-control'],
            'label' => trans('contactwebsites::contactwebsites.form.type') ,
            'empty_value' => trans('core::core.empty_select')
        ]);


        $this->add('notes', 'textarea', [
            'label' => trans('contactwebsites::contactwebsites.form.notes'),
        ]);


        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);

    }

}
