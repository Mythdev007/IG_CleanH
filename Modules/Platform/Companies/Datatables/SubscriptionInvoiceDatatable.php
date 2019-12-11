<?php

namespace Modules\Platform\Companies\Datatables;

use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Subscription\Entities\SubscriptionInvoice;
use Yajra\DataTables\EloquentDataTable;

/**
 * Companies datatable
 *
 * Class CompaniesDatatable
 * @package Modules\Platform\Companies\Datatables
 */
class SubscriptionInvoiceDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'settings.subscription-invoice.show';

    protected $editRoute = 'settings.subscription-invoice.edit';

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
                $query->whereBetween('vaance_subscription_invoice.created_at', array($dates[0], $dates[1]));
            }
        });

        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('vaance_subscription_invoice.updated_at', array($dates[0], $dates[1]));
            }
        });


        $dataTable->filterColumn('status', function ($query, $keyword) {

            if ($keyword == 'yes') {
                $query->where('vaance_subscription_invoice.status', 1);
            } else {
                $query->where('vaance_subscription_invoice.status', 0);
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
    public function query(SubscriptionInvoice $model)
    {
        return $model->newQuery()->
        leftJoin('vaance_companies', 'vaance_subscription_invoice.company_id', '=', 'vaance_companies.id')
            ->select([
                'vaance_subscription_invoice.*',
                'vaance_companies.name as company_name'
            ]);
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
                'invoice_number' => [
                    'data' => 'invoice_number',
                    'title' => trans('companies::subscription_invoice.table.invoice_number'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'company' => [
                    'data' => 'company_name',
                    'name' => 'vaance_companies.name',
                    'title' => trans('companies::subscription_invoice.table.company'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'status' => [
                    'data' => 'status',
                    'title' => trans('companies::subscription_invoice.table.status'),
                    'data_type' => 'boolean',
                    'filter_type' => 'text'
                ],
                'provider_name' => [
                    'data' => 'provider_name',
                    'title' => trans('companies::subscription_invoice.table.provider_name'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'created_at' => [
                    'data' => 'created_at',
                    'title' => trans('companies::subscription_invoice.table.created_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ],
                'updated_at' => [
                    'data' => 'updated_at',
                    'title' => trans('companies::subscription_invoice.table.updated_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ]
            ];
    }
}
