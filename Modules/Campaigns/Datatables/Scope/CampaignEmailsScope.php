<?php

namespace Modules\Campaigns\Datatables\Scope;

use Modules\Campaigns\Entities\Campaign;
use Modules\Platform\Core\Helper\CompanySettings;
use Modules\Platform\Core\Interfaces\CrudRelatedScope;
use Modules\SentEmails\Entities\EmailContext;
use Yajra\DataTables\Contracts\DataTableScope;

/**
 * Class CampaignEmailsScope
 * @package Modules\Campaigns\Datatables\Scope
 */
class CampaignEmailsScope implements DataTableScope, CrudRelatedScope
{
    private $relation;

    private $whereCondition;

    private $whereType;

    private $entityId;

    public function relation($relation, $whereCondition = null, $whereType = null, $entityId = null)
    {
        $this->relation = $relation;
        $this->whereCondition = $whereCondition;
        $this->whereType = $whereType;
        $this->entityId = $entityId;
    }

    public function apply($query)
    {

        $context = CompanySettings::getContext();

        $emailIds = EmailContext::where('entity_id', $this->entityId)
            ->where('company_id', $context->get('company_id'))
            ->where('entity_type', Campaign::class)->pluck('email_id');

        $query->whereIn('emails.id', $emailIds);

    }
}
