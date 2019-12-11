<?php

namespace Modules\Testimonials\Datatables;

use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Core\QueryBuilderParser\QueryBuilderParser;
use Modules\Products\Entities\Product;
use Modules\Testimonials\Entities\ProductTestimonialGroup;
use Modules\Testimonials\Entities\Testimonial;
use Modules\Testimonials\Entities\TestimonialProductGroup;
use Spatie\ArrayToXml\ArrayToXml;
use Yajra\DataTables\EloquentDataTable;
use Modules\Testimonials\Entities\TestimonialStatusType;
use Modules\Testimonials\Entities\TestimonialVipType;
use Modules\Testimonials\Entities\TestimonialNpsType;
use Modules\Testimonials\Entities\TestimonialUsageType;

/**
 * Class TestimonialsDatatable
 * @package Modules\Payments\Datatables
 */
class TestimonialsDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'testimonials.testimonials.show';

    protected $editRoute = 'testimonials.testimonials.edit';


    protected $actions = ['print', 'csv', 'excel', 'pdf', 'xmlAction'];

    public static function availableColumns()
    {
        return [
            'contact_name' => [
                'name' => 'contacts.full_name',
                'data' => 'contact_name',
                'title' => trans('testimonials::testimonials.form.contact_id'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],
            'product_name' => [
                'name' => 'products.name',
                'data' => 'product_name',
                'title' => trans('testimonials::testimonials.form.product_id'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],


            'testimonial_title' => [
                'data' => 'testimonial_title',
                'title' => trans('testimonials::testimonials.form.testimonial_title'),
                'data_type' => 'text',
                'filter_type' => 'text',
            ],

            'status_name' => [
                'name' => 'testimonials_dict_status.name',
                'data' => 'status_name',
                'title' => trans('testimonials::testimonials.form.status_id'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],


            'nps_name' => [
                'name' => 'testimonials_dict_nps.name',
                'data' => 'nps_name',
                'title' => trans('testimonials::testimonials.form.nps_id') ."#2",
                'data_type' => 'text',
                'filter_type' => 'text'
            ],
            'vip_name' => [
                'name' => 'testimonials_dict_vip.name',
                'data' => 'vip_name',
                'title' => trans('testimonials::testimonials.form.vip_id'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],
            'usage_name' => [
                'name' => 'testimonials_dict_usage.name',
                'data' => 'usage_name',
                'title' => trans('testimonials::testimonials.form.usage_id'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],

        ];
    }

    public static function availableQueryFilters()
    {
        return [
            [
                'id' => 'testimonials.comment',
                'label' => trans('testimonials::testimonials.form.comment'),
                'type' => 'string',
            ],
            [
                'id' => 'contacts.full_name',
                'label' => trans('testimonials::testimonials.form.contact_id'),
                'type' => 'string',
            ],
            [
                'id' => 'testimonials.product_id',

                'label' => trans('testimonials::testimonials.form.product_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => Product::orderBy('name','asc')->pluck('name', 'id')->toArray(),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ],
            ],
            [
                'id' => 'products.product_testimonial_group_id',

                'label' => trans('testimonials::testimonials.product_testimonial_group'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => TestimonialProductGroup::all()->sortBy("name")->pluck('name', 'id')->toArray(),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ],
            ],
            [
                'id' => 'testimonials.created_at',
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
                'id' => 'testimonials.status_id',
                'label' => trans('testimonials::testimonials.form.status_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => TestimonialStatusType::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'testimonials.nps_id',
                'label' => trans('testimonials::testimonials.form.nps_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => TestimonialNpsType::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'testimonials.vip_id',
                'label' => trans('testimonials::testimonials.form.vip_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => TestimonialVipType::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
                ]
            ],
            [
                'id' => 'testimonials.usage_id',
                'label' => trans('testimonials::testimonials.form.usage_id'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => TestimonialUsageType::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                    'is_null',
                    'is_not_null'
            ]
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

        $dataTable->filterColumn('created_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('testimonials.created_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('testimonials.updated_at', array($dates[0], $dates[1]));
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
    public function query(Testimonial $model)
    {
        $query = $model->newQuery()
            ->leftJoin('testimonials_dict_status', 'testimonials.status_id', '=', 'testimonials_dict_status.id')
            ->leftJoin('testimonials_dict_vip', 'testimonials.vip_id', '=', 'testimonials_dict_vip.id')
            ->leftJoin('testimonials_dict_nps', 'testimonials.nps_id', '=', 'testimonials_dict_nps.id')
            ->leftJoin('testimonials_dict_usage', 'testimonials.usage_id', '=', 'testimonials_dict_usage.id')
            ->leftJoin('contacts', 'testimonials.contact_id', '=', 'contacts.id')
            ->leftJoin('products', 'testimonials.product_id', '=', 'products.id')
            ->select(
                'testimonials.*',
                'contacts.full_name as contact_name',
                'products.name as product_name',
                'testimonials_dict_status.name as status_name',
                'testimonials_dict_vip.name as vip_name',
                'testimonials_dict_nps.name as nps_name',
                'testimonials_dict_usage.name as usage_name'
            );

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
                'buttons' => DataTableHelper::buttons('Exported Records', ['xmlAction']),
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

        $columns = self::availableColumns();


        $result = [];

        if ($this->allowSelect) {
            $result = $this->btnCheck_selection;
        }
        if ($this->allowUnlink) {
            $result = $this->btnUnlink;
        }
        if ($this->allowQuickEdit) {
            $result = $result + $this->btnQuick_edit;;
        }

        $result = $result + $columns;

        return $result;
    }

    public function xmlAction()
    {

        $dataForExport = collect($this->getDataForExport());

        $export = [
            'export' => $dataForExport->toArray()
        ];

        return response()->streamDownload(function() use ($export){

            echo  ArrayToXml::convert($export);

        },'export.xml');

    }


}
