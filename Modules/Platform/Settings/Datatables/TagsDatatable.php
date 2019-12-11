<?php

namespace Modules\Platform\Settings\Datatables;

use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Settings\Entities\VaanceTags;
use Spatie\Tags\Tag;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class TagsDatatable
 * @package Modules\Platform\Settings\Datatables
 */
class TagsDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'settings.tags.show';

    protected $editRoute = 'settings.tags.edit';

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);


        $this->applyLinks($dataTable, self::SHOW_URL_ROUTE);

        $dataTable->filterColumn('created_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('created_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('updated_at', array($dates[0], $dates[1]));
            }
        });

        return $dataTable;
    }

    /**
     *
     * @param Tag $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(VaanceTags $model)
    {
        return $model->newQuery()->select();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->setTableAttribute('class', 'table table-hover')
            ->parameters([
                'dom' => 'lBfrtip',
                'responsive' => false,
                'stateSave' => true,
                'headerFilters' => true,
                'buttons' => DataTableHelper::buttons(),
                'regexp' => true
            ]);
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        return
            $this->btnQuick_edit +
            [
                'name' => [
                    'data' => 'name',
                    'title' => trans('settings::tags.table.name'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'created_at' => [
                    'data' => 'created_at',
                    'title' => trans('settings::tags.table.created_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ],
                'updated_at' => [
                    'data' => 'updated_at',
                    'title' => trans('settings::tags.table.updated_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ]
            ];
    }
}
