<?php

namespace Modules\Contacts\Http\Controllers\Tabs;

use Modules\ContactMailinglists\Entities\ContactMailinglist;
use Modules\Contacts\Datatables\Tabs\ContactMailinglistsDatatable;
use Modules\Contacts\Entities\Contact;
use Modules\Platform\Core\Datatable\Scope\BasicRelationScope;
use Modules\Platform\Core\Http\Controllers\ModuleCrudRelationController;

/**
 * Class ContactCallsController
 * @package Modules\Contacts\Http\Controllers\Tabs
 */
class ContactMailinglistsController extends ModuleCrudRelationController
{
    protected $datatable = ContactMailinglistsDatatable::class;

    protected $ownerModel = Contact::class;

    protected $relationModel = ContactMailinglist::class;

    protected $ownerModuleName = 'contacts';

    protected $relatedModuleName = 'contactmailinglists';

    protected $scopeLinked = BasicRelationScope::class;

    protected $modelRelationName = 'contactMailinglists';

    protected $relationType = self::RT_ONE_TO_MANY;

    protected $belongsToName = 'contact';

    protected $whereCondition = 'contact_mailinglist.contact_id';

    protected $whereType = self::WHERE_TYPE__COLUMN;
}
