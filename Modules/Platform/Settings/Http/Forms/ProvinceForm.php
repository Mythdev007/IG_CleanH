<?php

namespace Modules\Platform\Settings\Http\Forms;

use Kris\LaravelFormBuilder\Form;

/**
 * Class ProvinceForm
 * @package Modules\Platform\Settings\Http\Forms
 */
class ProvinceForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => trans('settings::province.form.name'),
        ]);
        $this->add('abbr_prov', 'text', [
            'label' => trans('settings::province.form.abbr_prov'),
        ]);
        $this->add('is_active', 'checkbox', [
            'label' => trans('settings::province.form.is_active'),
        ]);

        $this->add('submit', 'submit', [
            'label' => trans('settings::language.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
