<?php

namespace Modules\Dashboard\Datatables;

use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Core\QueryBuilderParser\QueryBuilderParser;
use Modules\PolizzaCar\Entities\PolizzaCar;
use Modules\PolizzaCar\Entities\PolizzaCarStatus;
use Yajra\DataTables\EloquentDataTable;
class PolizzaCarDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'polizzacar.polizzacar.show';

    protected $editRoute = 'polizzacar.polizzacar.edit';

    public $status_id;

    public $allowSelect = false;

    public static function availableQueryFilters()
    {
        return [
            [
                'id' => 'polizza_car.date_request',
                'title' => trans('PolizzaCar::PolizzaCar.form.date_request'),
                'type' => 'date',
                'input_event' => 'dp.change',
                'plugin' => 'datetimepicker',
                'plugin_config' => [
                    'locale' => app()->getLocale(),
                    'calendarWeeks' => true,
                    'showClear' => true,
                    'showTodayButton' => true,
                    'showClose' => true,
                    'format' => \Modules\Platform\Core\Helper\UserHelper::userJsDateFormat()
                ]
            ],
            [
                'id' => 'polizza_car.id',
                'label' => trans('PolizzaCar::PolizzaCar.form.numero_polizza'),
                'type' => 'string',
            ],
            [
                'id' => 'polizza_car.company_name',
                'label' => trans('PolizzaCar::PolizzaCar.form.company_name'),
                'type' => 'string',
            ],
            [
                'id' => 'polizza_car.company_vat',
                'label' => trans('PolizzaCar::PolizzaCar.form.company_vat'),
                'type' => 'string',
            ],
            [
                'id' => 'polizza_car.works_place_city',
                'label' => trans('PolizzaCar::PolizzaCar.form.works_place_city'),
                'type' => 'string',
            ],
            [
                'id' => 'polizza_car.status',
                'title' => trans('PolizzaCar::PolizzaCar.form.stato'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => PolizzaCarStatus::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],

            
            [
                'id' => 'polizza_car.created_at',
                'label' => trans('core::core.table.created_at'),
                'type' => 'date',
                'input_event' => 'dp.change',
                'plugin' => 'datetimepicker',
                'plugin_config' => [
                    'locale' => app()->getLocale(),
                    'calendarWeeks' => true,
                    'showClear' => true,
                    'showTodayButton' => true,
                    'showClose' => true,
                    'format' => \Modules\Platform\Core\Helper\UserHelper::userJsDateFormat()
                ]
            ],
            [
                'id' => 'polizza_car.updated_at',
                'label' => trans('core::core.table.updated_at'),
                'type' => 'date',
                'input_event' => 'dp.change',
                'plugin' => 'datetimepicker',
                'plugin_config' => [
                    'locale' => app()->getLocale(),
                    'calendarWeeks' => true,
                    'showClear' => true,
                    'showTodayButton' => true,
                    'showClose' => true,
                    'format' => \Modules\Platform\Core\Helper\UserHelper::userJsDateFormat()
                ]
            ],
        ];
    }

    public static function availableColumns()
    {
        return [
            'date_request' => [
                'data' => 'date_request',
                'title' => trans('PolizzaCar::PolizzaCar.form.date_request'),
                'data_type' => 'date',
                'filter_type' => 'vaance_date_range_picker',
            ],
            'company_name' => [
                'data' => 'company_name',
                'title' => trans('PolizzaCar::PolizzaCar.form.company_name'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],
            'numero_polizza' => [
                'data' => 'id',
                'title' => trans('PolizzaCar::PolizzaCar.form.numero_polizza'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],
            'status' => [
                'name' => 'polizza_car_status.name',
                'data' => 'status',
                'title' => trans('PolizzaCar::PolizzaCar.form.stato'),
                'data_type' => 'text',
                'filter_type' => 'text',
                'column_name' => 'status_id'
            ],
        ];
    }

    

    protected function setFilterDefinition()
    {
        $this->filterDefinition = self::availableQueryFilters();
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


        $this->applyLinks($dataTable, self::SHOW_URL_ROUTE);

        $dataTable->editColumn('status', function ($record) {
            $text = "
            <img class='status' src='$record->image'/>
            <span class='badge badge-default bg-$record->color'>" . trans('PolizzaCar::PolizzaCar.status.status_'.$record->status_id.'')."</span>";
            
            return DataTableHelper::applyLink($text,route(self::SHOW_URL_ROUTE,$record->id));
        });

        $dataTable->filterColumn('created_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('polizza_car.created_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('date_request', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('polizza_car.date_request', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('polizza_car.updated_at', array($dates[0], $dates[1]));
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
    public function query(PolizzaCar $model)
    {
        $query = $model->newQuery()
            ->leftJoin('vaance_country', 'polizza_car.country_id', '=', 'vaance_country.id')
            ->leftJoin('polizza_car_piano_tariffario', 'polizza_car.risk_id', '=', 'polizza_car_piano_tariffario.id')
            ->leftJoin('polizza_car_procurement','polizza_car.procurement_id','=','polizza_car_procurement.id')
            ->leftJoin('polizza_car_status','polizza_car.status_id','=','polizza_car_status.id')
            ->select(
                'polizza_car.*',
                'vaance_country.name as country',
                'polizza_car_procurement.name as procurement',
                'polizza_car_status.name as status',
                'polizza_car_status.image as image',
                'polizza_car_status.color as color'
            );

        $user = auth()->user();

        switch ($user->role_id) {
            case '5': // User
                $query = $query->where('polizza_car.company_email', $user->email);
                break;

            case '4': // Buyer
                $query = $query->where('polizza_car.group_id', $user->group_id);
                break;
            
            default:
                # code...
                break;
        }

        if (!empty($this->filterRules)) {
            $queryBuilderParser = new  QueryBuilderParser();
            $queryBuilder = $queryBuilderParser->parse($this->filterRules, $query);

            return $queryBuilder;
        }

        return $query;
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
                'filterDefinitions' => $this->getFilterDefinition(),
                'filterRules' => $this->filterRules,
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
        if (!empty($this->advancedView)) {
            $result = [];
            if ($this->allowSelect) {
                $result = $this->btnCheck_selection;
            }
            return $result + $this->advancedView;
        }

        $columns =  self::availableColumns();


        $result = [];

        if ($this->allowSelect) {
            $result =  $this->btnCheck_selection;
        }
        if ($this->allowUnlink) {
            $result =  $this->btnUnlink ;
        }
        if ($this->allowQuickEdit) {
            $result =  $result + $this->btnQuick_edit; ;
        }

        $result = $result + $columns;

        return $result;
    }
}


