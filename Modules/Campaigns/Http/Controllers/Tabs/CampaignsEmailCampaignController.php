<?php

namespace Modules\Campaigns\Http\Controllers\Tabs;

use Modules\Campaigns\Datatables\Scope\CampaignEmailsScope;
use Modules\Campaigns\Datatables\Tabs\EmailCampaignDatatable;
use Modules\Campaigns\Entities\Campaign;
use Modules\Campaigns\Entities\EmailCampaign;
use Modules\Platform\Core\Datatable\Scope\BasicRelationScope;
use Modules\Platform\Core\Http\Controllers\ModuleCrudRelationController;


/**
 * Class CampaignsEmailCampaignController
 * @package Modules\Campaigns\Http\Controllers\Tabs
 */
class CampaignsEmailCampaignController extends ModuleCrudRelationController
{
    protected $datatable = EmailCampaignDatatable::class;

    protected $ownerModel = Campaign::class;

    protected $relationModel = EmailCampaign::class;

    protected $ownerModuleName = 'campaigns';

    protected $relatedModuleName = 'emailCampaigns';

    protected $scopeLinked = BasicRelationScope::class; // Custom Relation Scope

    protected $modelRelationName = 'emailCampaigns';

    protected $relationType = self::RT_ONE_TO_MANY;

    protected $belongsToName = 'campaign';



}
