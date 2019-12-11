<?php

namespace Modules\PolizzaCar\Http\Controllers\Settings;

use Modules\PolizzaCar\Datatables\Settings\PianoTariffarioDatatable;
use Modules\PolizzaCar\Entities\PianoTariffario;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\PolizzaCar\Http\Forms\PianoTariffarioForm;
use Modules\PolizzaCar\Http\Requests\PianoTariffarioRequest;

class PianoTariffarioController extends ModuleCrudController
{
    protected $datatable = PianoTariffarioDatatable::class;
    protected $formClass = PianoTariffarioForm::class;
    protected $storeRequest = PianoTariffarioRequest::class;
    protected $updateRequest = PianoTariffarioRequest::class;
    protected $entityClass = PianoTariffario::class;

    protected $disableWidgets = true;

    protected $moduleDictionary = true;


    protected $moduleName = 'polizzacar';

    protected $permissions = [
        'browse' => 'polizzacar.settings',
        'create' => 'polizzacar.settings',
        'update' => 'polizzacar.settings',
        'destroy' => 'polizzacar.settings'
    ];

    protected $settingsBackRoute = 'polizzacar.polizzacar.index';

    protected $showFields = [
        'details' => [
            'name' => ['type' => 'text', 'col-class' => 'col-lg-4'],
            'mm_24' => ['type' => 'text', 'col-class' => 'col-lg-4'],
            'mm_36' => ['type' => 'text', 'col-class' => 'col-lg-4'],
            'tax_rate' => ['type' => 'text', 'col-class' => 'col-lg-4'],
            'commission' => ['type' => 'text', 'col-class' => 'col-lg-4'],

        ]
    ];
    
    protected $languageFile = 'PolizzaCar::PolizzaCar.piano_tariffario';

    protected $routes = [
        'index' => 'polizzacar.piano_tariffario.index',
        'create' => 'polizzacar.piano_tariffario.create',
        'show' => 'polizzacar.piano_tariffario.show',
        'edit' => 'polizzacar.piano_tariffario.edit',
        'store' => 'polizzacar.piano_tariffario.store',
        'destroy' => 'polizzacar.piano_tariffario.destroy',
        'update' => 'polizzacar.piano_tariffario.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
