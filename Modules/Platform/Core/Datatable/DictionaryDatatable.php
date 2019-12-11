<?php

namespace Modules\Platform\Core\Datatable;

use Modules\Platform\Core\Helper\DataTableHelper;
use Yajra\DataTables\EloquentDataTable;

/**
 * Generic dictionary datatable
 *
 * Class DictionaryDatatable
 * @package Modules\Platform\Core\Datatable
 */
class DictionaryDatatable extends PlatformDataTable
{
    /**
     * Show route
     * @var string
     */
    protected $showRoute = '';

    /**
     * Edit route
     * @var string
     */
    protected $editRoute = '';

    /**
     * Eloquent model
     * @var null
     */
    protected $eloquentModel = null;

    /**
     * Override columns
     * @var array
     */
    protected $columns = [];

    /**
     * Set eloquent model
     * @param $model
     */
    public function setEloquentModel($model)
    {
        $this->eloquentModel = $model;
    }

    /**
     * Set routes
     * @param array $routes
     * @throws \Exception
     */
    public function setRoutes($routes = [])
    {
        if (!isset($routes['show']) || !isset($routes['edit'])) {
            throw new \Exception('ERROR_NO_ROUTE_SET_IN_DICTIONARY_DATATABLE');
        }

        $this->showRoute = $routes['show'];
        $this->editRoute = $routes['edit'];

    }

    /**
     * Override columns
     * @param array $colummns
     */
    public function setColumns($columns = [])
    {
        foreach ($columns as &$column){
            if(isset($column['title'])){
                $column['title'] = trans($column['title']);
            }
        }

        $this->columns = $columns;
    }


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $this->applyLinks($dataTable, $this->editRoute);

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
     * Get query source of dataTable.
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->eloquentModel->disableModelCaching()->newQuery()->select();
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

        if (count($this->columns) > 0) {
            return $this->btnQuick_edit + $this->columns;
        } else {
            return
                $this->btnQuick_edit +
                [
                    'name' => [
                        'data' => 'name',
                        'title' => trans('core::core.table.name'),
                        'data_type' => 'text',
                        'filter_type' => 'text'
                    ],
                    'created_at' => [
                        'data' => 'created_at',
                        'title' => trans('core::core.table.created_at'),
                        'data_type' => 'datetime',
                        'filter_type' => 'vaance_date_range_picker',
                    ],
                    'updated_at' => [
                        'data' => 'updated_at',
                        'title' => trans('core::core.table.updated_at'),
                        'data_type' => 'datetime',
                        'filter_type' => 'vaance_date_range_picker',
                    ]
                ];
        }

    }
}
