<?php

namespace Modules\Campaigns\Datatables\Tabs;


use Modules\Campaigns\Entities\EmailCampaign;
use Modules\Campaigns\Service\CampaignsService;
use Modules\Platform\Core\Datatable\RelationDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Modules\SentEmails\LaravelDatabaseEmails\Email;
use Yajra\DataTables\EloquentDataTable;

class EmailCampaignDatatable extends RelationDataTable
{

    const SHOW_URL_ROUTE = 'campaigns.emailcampaign.show';

    protected $unlinkRoute = 'campaigns.emailcampaign.unlink';

    protected $deleteRoute = 'campaigns.emailcampaign.delete';

    protected $editRoute = 'campaigns.emailcampaign.edit';

    protected $showRoute = 'campaigns.emailcampaign.show';

    public static function availableColumns()
    {
        return [
            'subject' => [
                'data' => 'subject',
                'title' => trans('campaigns::campaigns.table.subject'),
                'data_type' => 'text',
                'filter_type' => 'text'
            ],
            'created_at' => [
                'data' => 'created_at',
                'title' => trans('core::core.table.created_at'),
                'data_type' => 'datetime',
                'filter_type' => 'vaance_date_range_picker',
            ],

            'emails_to_sent' => [
                'title' => trans('campaigns::campaigns.table.emails_to_sent'),
                'data_type' => 'custom',
                'searchable' => false,
                'orderable' => false
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


        $this->applyLinks($dataTable, '', 'campaigns__sent_emails_');

        $dataTable->filterColumn('created_at', function ($query, $keyword) {

            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('emails.created_at', array($dates[0], $dates[1]));
            }
        });

        $dataTable->filterColumn('updated_at', function ($query, $keyword) {

            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('emails.updated_at', array($dates[0], $dates[1]));
            }
        });

        $campaignService = \App::make(CampaignsService::class);

        $dataTable->editColumn('emails_to_sent', function ($row) use ($campaignService) {
            return $campaignService->countSent($row);
        });



        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmailCampaign $model)
    {
        return $model->newQuery()->select();
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

        $result = $this->btnQuick_show;

        if ($this->allowSelect) {
            $result =  $this->btnCheck_selection;
        }
        if ($this->allowUnlink) {
            $result =  $this->btnUnlink ;
        }
        if ($this->allowUnlink) {
            $result =  $result + $this->btnQuick_edit; ;
        }

        $result = $result  + self::availableColumns();

        return $result;

    }

}
