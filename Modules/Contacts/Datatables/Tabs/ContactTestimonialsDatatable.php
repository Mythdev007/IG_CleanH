<?php

namespace Modules\Contacts\Datatables\Tabs;


use Modules\Platform\Core\Datatable\RelationDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Core\QueryBuilderParser\QueryBuilderParser;
use Modules\Testimonials\Datatables\TestimonialsDatatable;
use Modules\Testimonials\Entities\Testimonial;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class ContactTestimonialsDatatable
 * @package Modules\Contacts\Datatables\Tabs
 */
class ContactTestimonialsDatatable extends RelationDataTable
{
    const SHOW_URL_ROUTE = 'testimonials.testimonials.show';

    protected $unlinkRoute = 'contacts.testimonials.unlink';

    protected $editRoute = 'testimonials.testimonials.edit';

    public static function availableColumns()
    {
        return TestimonialsDatatable::availableColumns();
    }

    public static function availableQueryFilters()
    {
        return TestimonialsDatatable::availableQueryFilters();
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

        $this->applyLinks($dataTable, self::SHOW_URL_ROUTE, 'testimonials');

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
        // If you need to Customize override this
        return $this->tableBuilder();
    }

    /**
     * @return array
     */
    protected function getColumns()
    {

        $columns = TestimonialsDatatable::availableColumns();

        $result = [];

        if ($this->allowSelect) {
            $result =  $this->btnCheck_selection;
        }
        if ($this->allowUnlink) {
            $result =  $this->btnUnlink ;
        }
        if ($this->allowUnlink) {
            $result =  $result + $this->btnQuick_edit; ;
        }

        $result = $result + $columns;

        return $result;
    }
}
