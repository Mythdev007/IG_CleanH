<?php

namespace Modules\Products\Http\Controllers\Tabs;

use Modules\Platform\Core\Datatable\Scope\BasicRelationScope;
use Modules\Platform\Core\Http\Controllers\ModuleCrudRelationController;
use Modules\Products\Datatables\Tabs\ProductDatesDatatable;
use Modules\Products\Entities\ProductDates;
use Modules\Products\Entities\Product;

/**
 * Class ProductDatesTabController
 * @package Modules\Products\Http\Controllers\Tabs
 */
class ProductDatesTabController extends ModuleCrudRelationController
{
    protected $datatable = ProductDatesDatatable::class;

    protected $ownerModel = Product::class;

    protected $relationModel = ProductDates::class;

    protected $ownerModuleName = 'products';

    protected $relatedModuleName = 'products';

    protected $scopeLinked = BasicRelationScope::class;

    protected $modelRelationName = 'productDates';

    protected $relationType = self::RT_ONE_TO_MANY;

    protected $belongsToName = 'product';

    protected $whereCondition = 'products_dates.product_id';

    protected $whereType = self::WHERE_TYPE__COLUMN;
}
