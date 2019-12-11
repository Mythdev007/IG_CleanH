<?php

namespace Modules\Products\Http\Controllers;


use App\Http\Requests\Request;
use Modules\Platform\Core\Http\Controllers\ModuleCrudController;
use Modules\Products\Datatables\ProductDatesDatatable;
use Modules\Products\Entities\ProductDates;
use Modules\Products\Http\Forms\ProductDatesForm;
use Modules\Products\Http\Requests\ProductDatesRequest;

class ProductDatesController extends ModuleCrudController
{
    protected $datatable = ProductDatesDatatable::class;
    protected $formClass = ProductDatesForm::class;
    protected $storeRequest = ProductDatesRequest::class;
    protected $updateRequest = ProductDatesRequest::class;
    protected $entityClass = ProductDates::class;

    protected $moduleName = 'products';

    protected $permissions = [
        'browse' => 'products.browse',
        'create' => 'products.create',
        'update' => 'products.update',
        'destroy' => 'products.destroy'
    ];

    protected $showFields = [

        'information' => [

            'product_date' => [
                'type' => 'text',
                'col-class' => 'col-xs-12 col-sm-12 col-md-12 col-lg-12'
            ],

            'description' => ['type' => 'textarea', 'col-class' => 'col-lg-12 col-md-12 col-sm-12'],
        ],


    ];

    public function beforeIndex($request, &$datatable, &$additionalVariables)
    {

        $productId = $request->get('productId');

        $datatable->setAdditionalValues([
            'productId' => $productId
        ]);

    }


    protected $languageFile = 'products::products_dates';

    protected $routes = [
        'index' => 'products.products_dates.index',
        'create' => 'products.products_dates.create',
        'show' => 'products.products_dates.show',
        'edit' => 'products.products_dates.edit',
        'store' => 'products.products_dates.store',
        'destroy' => 'products.products_dates.destroy',
        'update' => 'products.products_dates.update'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Load price list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadProductDates(Request $request)
    {
        $productDatesId = $request->get('productDatesId', null);

        $productDatesList = ProductDates::find($productDatesId);

        $productDatesData = [
            'name' => '',
            'product_date_id' => 0,
            'product_id' => ''
        ];

        if ($productDatesList != null) {
            $productDatesData  = [
                'name' => $productDatesList->name,
                'price' => $productDatesList->price,
                'product_date_id' => $productDatesList->id,
                'product_id' => $productDatesList->product_id,
            ];

            if(!empty($productDatesList->product)){
                $productDatesData ['product_name'] = $productDatesList->product->name.' - '.$productDatesList->name;
            }

        }

        return response()->json([
            'data' => $productDatesData
        ]);
    }

}
