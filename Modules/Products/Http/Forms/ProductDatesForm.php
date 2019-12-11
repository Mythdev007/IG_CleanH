<?php

namespace Modules\Products\Http\Forms;

use Kris\LaravelFormBuilder\Form;
use Modules\Platform\Core\Helper\FormHelper;

class ProductDatesForm extends Form
{
    public function buildForm()
    {

        $this->add('product_date', 'dateType', [
            'label' => trans('products::products_dates.form.date'),
        ]);

        $this->add('description', 'textarea', [
            'label' => trans('products::products_dates.form.description'),
        ]);

        $this->add('submit', 'submit', [
            'label' => trans('core::core.form.save'),
            'attr' => ['class' => 'btn btn-primary m-t-15 waves-effect']
        ]);
    }
}
