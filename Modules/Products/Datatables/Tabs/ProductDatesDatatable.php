<?php

namespace Modules\Products\Datatables\Tabs;

use Modules\Platform\Core\Datatable\RelationDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Core\QueryBuilderParser\QueryBuilderParser;
use Modules\Products\Entities\ProductDates;
use Yajra\DataTables\EloquentDataTable;

class ProductDatesDatatable extends RelationDataTable
{
    const SHOW_URL_ROUTE = 'products.products_dates.show';

    protected $unlinkRoute = 'products.products_dates.unlink';

    protected $deleteRoute = 'products.products_dates.delete';

    protected $editRoute = 'products.products_dates.edit';

    public static function availableQueryFilters()
    {
        return [
            [
                'product_date' => 'products_dates.date',
                'label' => trans('products::products_dates.form.date'),
                'type' => 'double',
            ]

        ];
    }

    public static function availableColumns()
    {
        return [
            'product_date' => [
                'data' => 'product_date',
                'title' => trans('products::products_dates.form.date'),
                'data_type' => 'text',
                'searchable' => false,
                'width' => '20%'
            ],
            'description' => [
                'data' => 'description',
                'title' => trans('products::products_dates.form.description'),
                'data_type' => 'text',
                'searchable' => false,
                'width' => '60%'
            ],
        ];
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

        $this->applyLinks($dataTable, '', 'price_dates_');

        $dataTable->filterColumn('owner', function ($query, $keyword) {
            DataTableHelper::queryOwner($query, $keyword, 'price_dates');
        });

        $dataTable->filterColumn('created_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('price_dates.created_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('price_dates.updated_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('date', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('price_dates.date', array($dates[0], $dates[1]));
            }
        });



        return $dataTable;
    }


    /**
     * @param ProductDates $model
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     * @throws \Modules\Platform\Core\QueryBuilderParser\QBParseException
     */
    public function query(ProductDates $model)
    {

        $query = $model->newQuery()
            ->with('owner')
            ->leftJoin('products', 'products_dates.product_id', '=', 'products.id')
            ->select(
                'products_dates.*'
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
        $table =  $this->tableBuilder();
        $table->parameters([
            'dom' => 'lrtip',
            ]);
        return $table;
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        $this->allowUnlink = false;
        $this->allowDelete = true;

        $result = $this->btnDelete + $this->btnQuick_edit;

        $result = $result + self::availableColumns();

        return $result;
    }
}
