<div class="row">
    @widget('Modules\Platform\Core\Widgets\AutoGroupDictWidget',
    [
    'coll_class' => 'col-lg-2 col-md-2 col-sm-6 col-xs-6',
    'dict' =>'Modules\Orders\Entities\OrderStatus',
    'moduleEntity' => 'Modules\Orders\Entities\Order',
    'moduleTable' =>'orders',
    'groupBy' => 'order_status_id',
    'dataTableToFilter' => 'dataTableBuilder'
    ]
    )
</div>
