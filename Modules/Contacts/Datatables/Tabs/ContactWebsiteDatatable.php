<?php

namespace Modules\Contacts\Datatables\Tabs;


use Modules\ContactWebsites\Entities\ContactWebsite;
use Modules\Platform\Core\Datatable\RelationDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Yajra\DataTables\EloquentDataTable;

class ContactWebsiteDatatable extends RelationDataTable
{

    const SHOW_URL_ROUTE = 'contactwebsites.contactwebsites.show';

    protected $unlinkRoute = 'contacts.contactwebsites.unlink';

    protected $deleteRoute = 'contacts.contactwebsites.delete';

    protected $editRoute = 'contactwebsites.contactwebsites.edit';

    public static function availableColumns()
    {
        return [
            'url' => [
                'data' => 'url',
                'title' => trans('contactwebsites::contactwebsites.table.url'),
                'data_type' => 'text',
                'filter_type' => 'text',
                'width' => '80%',
            ],

            'type_name' => [
                'data' => 'type_name',
                'title' => trans('contactwebsites::contactwebsites.form.type'),
                'data_type' => 'text',
                'width' => '10%'
            ],

            'is_default' => [
                'data' => 'is_default',
                'title' => trans('contactwebsites::contactwebsites.table.is_default'),
                'data_type' => 'boolean',
            ],
            'is_active' => [
                'data' => 'is_active',
                'title' => trans('contactwebsites::contactwebsites.table.is_active'),
                'data_type' => 'boolean',
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


        $this->applyLinks($dataTable, '', 'contact_websites_');


        $dataTable->editColumn('url', function ($record) {
            $text = "<span class='badge bg-grey'><i class='fa external-link-alt'></i> $record->url</span>";
            return "<a href='" . $record->url . "' target='_blank' >" . $text . "</a>";
        });

        $dataTable->filterColumn('is_default', function ($query, $keyword) {

            if ($keyword == 'yes') {
                $query->where('contact_websites.is_default', 1);
            } else {
                $query->where('contact_websites.is_default', 0);
            }
        });
        $dataTable->filterColumn('is_active', function ($query, $keyword) {

            if ($keyword == 'yes') {
                $query->where('contact_websites.is_active', 1);
            } else {
                $query->where('contact_websites.is_active', 0);
            }
        });

        $dataTable->filterColumn('updated_at', function ($query, $keyword) {

            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_websites.updated_at', array($dates[0], $dates[1]));
            }
        });


        $dataTable->filterColumn('created_at', function ($query, $keyword) {

            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('contact_websites.created_at', array($dates[0], $dates[1]));
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
    public function query(ContactWebsite $model)
    {
        $query = $model->newQuery()
            ->leftJoin('vaance_website_dict_types', 'contact_websites.type_id', '=', 'vaance_website_dict_types.id')
            ->select(
                'contact_websites.*',
                'vaance_website_dict_types.name as type_name'
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
        return $this->tableBuilder();
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
