<?php

namespace Modules\Contacts\Http\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Accounts\Entities\Account;
use Modules\Contacts\Entities\ContactSource;
use Modules\Contacts\Entities\ContactStatus;
use Modules\Platform\Core\Helper\FormHelper;

class MailingListForm extends Form
{
    public function buildForm()
    {

        $this->add('name', 'text', [
            'label' => trans('contacts::contacts.mailinglist.form.name'),
        ]);

        $this->add('description', 'textarea', [
            'label' => trans('contacts::contacts.mailinglist.form.description'),
        ]);

        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
