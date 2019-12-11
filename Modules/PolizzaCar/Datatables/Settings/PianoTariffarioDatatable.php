<?php

namespace Modules\PolizzaCar\Datatables\Settings;

use Modules\PolizzaCar\Entities\PianoTariffario;
use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Yajra\DataTables\EloquentDataTable;

class PianoTariffarioDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'polizzacar.piano_tariffario.show';

    protected $editRoute = 'polizzacar.piano_tariffario.edit';

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
     * Get query source of dataTable.
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PianoTariffario $model)
    {
        return $model->disableModelCaching()->newQuery()->select();
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
                    'title' => trans('PolizzaCar::PolizzaCar.form.risk_id'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'mm_24' => [
                    'data' => 'mm_24',
                    'title' => trans('PolizzaCar::PolizzaCar.form.24_month'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'mm_36' => [
                    'data' => 'mm_36',
                    'title' => trans('PolizzaCar::PolizzaCar.form.36_month'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'tax_rate' => [
                    'data' => 'tax_rate',
                    'title' => trans('PolizzaCar::PolizzaCar.form.tax_rate'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'commission' => [
                    'data' => 'commission',
                    'title' => trans('PolizzaCar::PolizzaCar.form.commission'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'created_at' => [
                    'data' => 'created_at',
                    'title' => trans('core::core.table.created_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ],
            ];
    }
}
