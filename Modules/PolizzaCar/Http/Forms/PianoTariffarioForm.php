<?php

namespace Modules\PolizzaCar\Http\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;

class PianoTariffarioForm extends Form
{
    public function buildForm()
    { 
        $this->add('name', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.risk_id'),
        ]);

        $this->add('mm_24', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.24_month'),
        ]);

        $this->add('mm_36', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.36_month'),
        ]);
        $this->add('tax_rate', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.tax_rate'),
        ]);
        $this->add('commission', 'text', [
            'label' => trans('PolizzaCar::PolizzaCar.form.commission'),
        ]);
       
        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
