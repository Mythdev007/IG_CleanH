<?php

namespace Modules\Contacts\Datatables\Tabs;


use Modules\ContactMailinglists\Entities\ContactMailinglist;
use Modules\Platform\Core\Datatable\RelationDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Yajra\DataTables\EloquentDataTable;

class ContactMailinglistsDatatable extends RelationDataTable
{

    const SHOW_URL_ROUTE = 'contactmailinglists.contactmailinglists.show';

    protected $unlinkRoute = 'contacts.contactmailinglists.unlink';

    protected $deleteRoute = 'contacts.contactmailinglists.delete';

    protected $editRoute = 'contactmailinglists.contactmailinglists.edit';

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


        $this->applyLinks($dataTable, '', 'contact_mailinglists_');


        $dataTable->editColumn('url', function ($record) {
            $text = "<span class='badge bg-grey'><i class='fa external-link-alt'></i> $record->url</span>";
            return "<a href='" . $record->url . "' target='_blank' >" . $text . "</a>";
        });

        $dataTable->filterColumn('is_default', function ($query, $keyword) {

            if ($keyword == 'yes') {
                $query->where('contact_mailinglist.is_default', 1);
            } else {
                $query->where('contact_mailinglist.is_default', 0);
            }
        });
        $dataTable->filterColumn('is_active', function ($query, $keyword) {

            if ($keyword == 'yes') {
                $query->where('contact_mailinglist.is_active', 1);
            } else {
                $query->where('contact_mailinglist.is_active', 0);
            }
        });

        $dataTable->filterColumn('updated_at', function ($query, $keyword) {

            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_mailinglist.updated_at', array($dates[0], $dates[1]));
            }
        });

        $dataTable->filterColumn('unsubscribe_date', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_mailinglist.unsubscribe_date', array($dates[0], $dates[1]));
            }
        });


        $dataTable->filterColumn('subscribe_date', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_mailinglist.subscribe_date', array($dates[0], $dates[1]));
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

    public function html()
    {
        // If you need to Customize override this
        $table =  $this->tableBuilder();
        $table->parameters([
                'dom' => 'lBrtip']);
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
