<?php

namespace Modules\ContactMailinglists\Datatables;


use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\Platform\Core\QueryBuilderParser\QueryBuilderParser;
use Modules\ContactMailinglists\Entities\ContactMailinglist;
use Modules\ContactMailinglists\Entities\MailinglistDict;
use Spatie\ArrayToXml\ArrayToXml;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class TestimonialsDatatable
 * @package Modules\Payments\Datatables
 */
class ContactMailinglistsDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'contactmailinglists.contactmailinglists.show';

    protected $editRoute = 'contactmailinglists.contactmailinglists.edit';


    protected $actions = ['print', 'csv', 'excel', 'pdf', 'xmlAction'];

    public static function availableColumns()
    {
        return [
            'mailinglist_id' => [
                'data' => 'mailinglist_name',
                'title' => trans('contactmailinglists::contactmailinglists.table.mailinglist'),
                'data_type' => 'text',
                'searchable' => false,
            ],

            'subscribe_ip' => [
                'data' => 'subscribe_ip',
                'title' => trans('contactmailinglists::contactmailinglists.table.subscribe_ip'),
                'data_type' => 'text',
                'filter_type' => 'text',
                'searchable' => true,
            ],

            'subscribe_email_id' => [
                'data' => 'subscribed_registered_email',
                'title' => trans('contactmailinglists::contactmailinglists.table.subscribe_email_id'),
                'data_type' => 'text',
                'searchable' => false,
            ],

            'subscribe_date' => [
                'data' => 'subscribe_date',
                'title' => trans('contactmailinglists::contactmailinglists.table.joined_date'),
                'data_type' => 'datetime',
                'filter_type' => 'vaance_date_range_picker',
                'searchable' => true,
            ],

            'unsubscribe_date' => [
                'data' => 'unsubscribe_date',
                'title' => trans('contactmailinglists::contactmailinglists.table.left_date'),
                'data_type' => 'datetime',
                'filter_type' => 'vaance_date_range_picker',
                'searchable' => true,
            ],

        ];
    }

    public static function availableQueryFilters()
    {
        return [
            [
                'id' => 'contact_mailinglist.mailinglist_id',

                'label' => trans('contactmailinglists::contactmailinglists.form.mailinglist'),
                'type' => 'integer',
                'input' => 'select',
                'multiple' => true,
                'plugin' => 'select2',
                'plugin_config' => [
                    'multiple' => 'multiple',
                    'width' => '300px',
                ],
                'values' => MailinglistDict::pluck('name', 'id'),
                'operators' => [
                    'in',
                    'not_in',
                ],
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
                $query->whereBetween('contact_mailinglist.created_at', array($dates[0], $dates[1]));
            }
        });

        $dataTable->filterColumn('subscribe_date', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_mailinglist.subscribe_date', array($dates[0], $dates[1]));
            }
        });

        $dataTable->filterColumn('unsubscribe_date', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_mailinglist.unsubscribe_date', array($dates[0], $dates[1]));
            }
        });


        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_mailinglist.updated_at', array($dates[0], $dates[1]));
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
    public function query(ContactMailinglist $model)
    {
        $query = $model->newQuery()
            ->leftJoin('mailinglist_dict', 'contact_mailinglist.mailinglist_id', '=', 'mailinglist_dict.id')
            ->leftJoin('contact_email', 'contact_mailinglist.subscribe_email_id', '=', 'contact_email.id')
            ->select(
                'contact_mailinglist.*',
                'mailinglist_dict.name as mailinglist_name',
                'contact_email.email as subscribed_registered_email'
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
                'dom' => 'lBrtip',
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
