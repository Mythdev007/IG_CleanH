<?php

namespace Modules\Leads\Http\Controllers\Tabs;

use Modules\ContactEmails\Entities\ContactEmail;
use Modules\Contacts\Datatables\Scope\ContactSentEmailsScope;
use Modules\Contacts\Datatables\Tabs\ContactEmailDatatable;
use Modules\Contacts\Datatables\Tabs\ContactSentEmailsDatatable;
use Modules\Contacts\Entities\Contact;
use Modules\Leads\Datatables\Scope\LeadSentEmailsScope;
use Modules\Leads\Datatables\Tabs\LeadSentEmailsDatatable;
use Modules\Leads\Entities\Lead;
use Modules\Platform\Core\Datatable\Scope\BasicRelationScope;
use Modules\Platform\Core\Http\Controllers\ModuleCrudRelationController;
use Modules\SentEmails\LaravelDatabaseEmails\Email;


/**
 * Class LeadSentEmailsController
 * @package Modules\Leads\Http\Controllers\Tabs
 */
class LeadSentEmailsController extends ModuleCrudRelationController
{
    protected $datatable = LeadSentEmailsDatatable::class;

    protected $ownerModel = Lead::class;

    protected $relationModel = Email::class;

    protected $ownerModuleName = 'leads';

    protected $relatedModuleName = 'sentemails';

    protected $scopeLinked = LeadSentEmailsScope::class; // Custom Relation Scope

    protected $modelRelationName = 'leadEmails';

    protected $relationType = self::RT_ONE_TO_MANY;

    protected $belongsToName = 'lead';



}
