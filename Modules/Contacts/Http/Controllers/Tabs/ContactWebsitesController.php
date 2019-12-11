<?php

namespace Modules\Contacts\Http\Controllers\Tabs;

use Modules\ContactWebsites\Entities\ContactWebsite;
use Modules\Contacts\Datatables\Tabs\ContactWebsiteDatatable;
use Modules\Contacts\Entities\Contact;
use Modules\Platform\Core\Datatable\Scope\BasicRelationScope;
use Modules\Platform\Core\Http\Controllers\ModuleCrudRelationController;

/**
 * Class ContactCallsController
 * @package Modules\Contacts\Http\Controllers\Tabs
 */
class ContactWebsitesController extends ModuleCrudRelationController
{
    protected $datatable = ContactWebsiteDatatable::class;

    protected $ownerModel = Contact::class;

    protected $relationModel = ContactWebsite::class;

    protected $ownerModuleName = 'contacts';

    protected $relatedModuleName = 'contactwebsites';

    protected $scopeLinked = BasicRelationScope::class;

    protected $modelRelationName = 'contactWebsite';

    protected $relationType = self::RT_ONE_TO_MANY;

    protected $belongsToName = 'contact';

    protected $whereCondition = 'contact_websites.contact_id';

    protected $whereType = self::WHERE_TYPE__COLUMN;
}
