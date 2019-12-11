<div class="row">
    @widget('Modules\Platform\Core\Widgets\AutoGroupDictWidget',
    [
    'coll_class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-4',
    'dict' =>'Modules\PolizzaCar\Entities\PolizzaCarStatus',
    'moduleEntity' => 'Modules\PolizzaCar\Entities\PolizzaCar',
    'moduleTable' =>'polizza_car',
    'icon_type' => 'material',
    'groupBy' => 'status_id',
    'dataTableToFilter' => 'dataTableBuilder'
    ]
    )
</div>
