<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\Calls\Entities{
/**
 * Modules\Calls\Entities\DirectionType
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\DirectionType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\DirectionType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\DirectionType withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\DirectionType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 */
	class DirectionType extends \Eloquent {}
}

namespace Modules\Calls\Entities{
/**
 * Modules\Calls\Entities\CallStatus
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Calls\Entities\CallStatus newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Calls\Entities\CallStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\CallStatus onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Calls\Entities\CallStatus query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\CallStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\CallStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\CallStatus withoutTrashed()
 * @mixin \Eloquent
 */
	class CallStatus extends \Eloquent {}
}

namespace Modules\Calls\Entities{
/**
 * Modules\Calls\Entities\Call
 *
 * @property int $id
 * @property string|null $subject
 * @property string|null $phone_number
 * @property string|null $duration
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property \Illuminate\Support\Carbon|null $call_date
 * @property int|null $account_id
 * @property int|null $contact_id
 * @property int|null $lead_id
 * @property int|null $company_id
 * @property int|null $direction_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @property-read \Modules\Calls\Entities\DirectionType|null $direction
 * @property-read \Modules\Leads\Entities\Lead|null $lead
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\Call onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereCallDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereDirectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\Call withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calls\Entities\Call withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Calls\Entities\Call[] $owner
 * @property int|null $status_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calls\Entities\Call whereStatusId($value)
 * @property-read \Modules\Calls\Entities\CallStatus $callStatus
 * @property-read int|null $comments_count
 */
	class Call extends \Eloquent {}
}

namespace Modules\Tickets\Entities{
/**
 * Modules\Tickets\Entities\Ticket
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $due_date
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $ticket_priority_id
 * @property int|null $ticket_status_id
 * @property int|null $ticket_severity_id
 * @property int|null $ticket_category_id
 * @property string|null $description
 * @property string|null $resolution
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $contact_id
 * @property int|null $account_id
 * @property int|null $company_id
 * @property int|null $parent_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Modules\Tickets\Entities\Ticket|null $parent
 * @property-read \Modules\Tickets\Entities\TicketCategory|null $ticketCategory
 * @property-read \Modules\Tickets\Entities\TicketPriority|null $ticketPriority
 * @property-read \Modules\Tickets\Entities\TicketSeverity|null $ticketSeverity
 * @property-read \Modules\Tickets\Entities\TicketStatus|null $ticketStatus
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Tickets\Entities\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\Ticket onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereResolution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereTicketCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereTicketPriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereTicketSeverityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereTicketStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\Ticket withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\Ticket withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Tickets\Entities\Ticket[] $owner
 * @property int|null $ticket_owner_id
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read \Modules\Platform\User\Entities\User|null $ticketOwner
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\Ticket whereTicketOwnerId($value)
 */
	class Ticket extends \Eloquent {}
}

namespace Modules\Tickets\Entities{
/**
 * Modules\Tickets\Entities\TicketPriority
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketPriority onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketPriority withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketPriority withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority query()
 * @property int|null $company_id
 * @property string|null $color
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketPriority whereIcon($value)
 */
	class TicketPriority extends \Eloquent {}
}

namespace Modules\Tickets\Entities{
/**
 * Modules\Tickets\Entities\TicketStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus query()
 * @property int|null $company_id
 * @property string|null $system_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketStatus whereSystemName($value)
 */
	class TicketStatus extends \Eloquent {}
}

namespace Modules\Tickets\Entities{
/**
 * Modules\Tickets\Entities\TicketSeverity
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketSeverity onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketSeverity withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketSeverity withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity query()
 * @property int|null $company_id
 * @property string|null $color
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketSeverity whereIcon($value)
 */
	class TicketSeverity extends \Eloquent {}
}

namespace Modules\Tickets\Entities{
/**
 * Modules\Tickets\Entities\TicketCategory
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Tickets\Entities\TicketCategory withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Tickets\Entities\TicketCategory whereCompanyId($value)
 */
	class TicketCategory extends \Eloquent {}
}

namespace Modules\Vendors\Entities{
/**
 * Modules\Vendors\Entities\VendorCategory
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Vendors\Entities\VendorCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Vendors\Entities\VendorCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Vendors\Entities\VendorCategory withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\VendorCategory whereCompanyId($value)
 */
	class VendorCategory extends \Eloquent {}
}

namespace Modules\Vendors\Entities{
/**
 * Modules\Vendors\Entities\Vendor
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $vendor_category_id
 * @property int|null $supplier_id
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $secondary_email
 * @property string|null $fax
 * @property string|null $skype_id
 * @property string|null $street
 * @property string|null $state
 * @property string|null $country
 * @property string|null $zip_code
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $city
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Modules\Vendors\Entities\VendorCategory|null $vendorCategory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Vendors\Entities\Vendor onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereSecondaryEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereSkypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereVendorCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Vendors\Entities\Vendor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Vendors\Entities\Vendor withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor query()
 * @property int|null $country_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Vendors\Entities\Vendor[] $owner
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Vendors\Entities\Vendor whereCountryId($value)
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 */
	class Vendor extends \Eloquent {}
}

namespace Modules\Payments\Entities{
/**
 * Modules\Payments\Entities\PaymentCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentCategory withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentCategory whereCompanyId($value)
 */
	class PaymentCategory extends \Eloquent {}
}

namespace Modules\Payments\Entities{
/**
 * Modules\Payments\Entities\Payment
 *
 * @property int $id
 * @property string $name
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon $payment_date
 * @property float $amount
 * @property int $income
 * @property int|null $payment_status_id
 * @property int|null $payment_category_id
 * @property int|null $payment_currency_id
 * @property int|null $payment_payment_method_id
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Modules\Payments\Entities\PaymentCategory|null $paymentCategory
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $paymentCurrency
 * @property-read \Modules\Payments\Entities\PaymentPaymentMethod|null $paymentPaymentMethod
 * @property-read \Modules\Payments\Entities\PaymentStatus|null $paymentStatus
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\Payment onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment wherePaymentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment wherePaymentCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment wherePaymentPaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment wherePaymentStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\Payment withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\Payment query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Payments\Entities\Payment[] $owner
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 */
	class Payment extends \Eloquent {}
}

namespace Modules\Payments\Entities{
/**
 * Modules\Payments\Entities\PaymentPaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentPaymentMethod onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentPaymentMethod withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentPaymentMethod withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentPaymentMethod whereCompanyId($value)
 */
	class PaymentPaymentMethod extends \Eloquent {}
}

namespace Modules\Payments\Entities{
/**
 * Modules\Payments\Entities\PaymentStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Payments\Entities\PaymentStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Payments\Entities\PaymentStatus whereCompanyId($value)
 */
	class PaymentStatus extends \Eloquent {}
}

namespace Modules\Calendar\Entities{
/**
 * Modules\Calendar\Entities\Event
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property int|null $full_day
 * @property string|null $event_color
 * @property int|null $calendar_id
 * @property int|null $event_priority_id
 * @property int|null $event_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $description
 * @property int|null $created_by
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Modules\Calendar\Entities\Calendar|null $calendar
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Calendar\Entities\EventPriority|null $eventPriority
 * @property-read \Modules\Calendar\Entities\EventStatus|null $eventStatus
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\User\Entities\User[] $sharedWith
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\Event onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereCalendarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereEventColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereEventPriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereEventStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereFullDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\Event withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Event query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Calendar\Entities\Event[] $owner
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $shared_with_count
 */
	class Event extends \Eloquent {}
}

namespace Modules\Calendar\Entities{
/**
 * Modules\Calendar\Entities\EventPriority
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\EventPriority onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\EventPriority withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\EventPriority withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventPriority whereCompanyId($value)
 */
	class EventPriority extends \Eloquent {}
}

namespace Modules\Calendar\Entities{
/**
 * Modules\Calendar\Entities\EventStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\EventStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\EventStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\EventStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\EventStatus whereCompanyId($value)
 */
	class EventStatus extends \Eloquent {}
}

namespace Modules\Calendar\Entities{
/**
 * Modules\Calendar\Entities\Calendar
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $is_public
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property string|null $default_view
 * @property int|null $first_day
 * @property string|null $day_start_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $created_by
 * @property int|null $company_id
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Calendar\Entities\Event[] $events
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\Calendar onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereDayStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereDefaultView($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereFirstDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\Calendar withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Calendar\Entities\Calendar withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Calendar\Entities\Calendar query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Calendar\Entities\Calendar[] $owner
 * @property-read int|null $events_count
 */
	class Calendar extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\Product
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $part_number
 * @property string|null $vendor_part_number
 * @property string|null $product_sheet
 * @property string|null $website
 * @property string|null $serial_no
 * @property float|null $price
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $vendor_id
 * @property int|null $product_type_id
 * @property int|null $product_category_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property string|null $image_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Contacts\Entities\Contact[] $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Leads\Entities\Lead[] $leads
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Modules\Products\Entities\ProductCategory|null $productCategory
 * @property-read \Modules\Products\Entities\ProductType|null $productType
 * @property-read \Modules\Vendors\Entities\Vendor|null $vendor
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\Product onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product wherePartNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereProductSheet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereProductTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereSerialNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereVendorPartNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\Product withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product query()
 * @property int|null $currency_id
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\Product[] $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\PriceList[] $priceList
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @property string|null $Markupvalue
 * @property string|null $startdate
 * @property string|null $enddate
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereEnddate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereMarkupvalue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereStartdate($value)
 * @property int|null $testimonial_group_id
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $contacts_count
 * @property-read int|null $leads_count
 * @property-read int|null $price_list_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\ProductDates[] $productDates
 * @property-read int|null $product_dates_count
 * @property-read \Modules\Testimonials\Entities\TestimonialProductGroup|null $testimonialGroup
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereTestimonialGroupId($value)
 */
	class Product extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\ProductType
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductType withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductType whereCompanyId($value)
 */
	class ProductType extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\ProductDates
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $company_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read mixed $name_product
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\ProductDates[] $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\ProductDates[] $owner
 * @property-read \Modules\Products\Entities\Product|null $product
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductDates onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductDates withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductDates withoutTrashed()
 * @mixin \Eloquent
 * @property int|null $currency_id
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereCurrencyId($value)
 * @property \Illuminate\Support\Carbon $product_date
 * @property string|null $description
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductDates whereProductDate($value)
 */
	class ProductDates extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\PriceList
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $company_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read mixed $name_product
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\PriceList[] $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\PriceList[] $owner
 * @property-read \Modules\Products\Entities\Product|null $product
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\PriceList onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\PriceList withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\PriceList withoutTrashed()
 * @mixin \Eloquent
 * @property int|null $currency_id
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereCurrencyId($value)
 * @property string|null $description
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\PriceList whereDescription($value)
 */
	class PriceList extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\ProductCategory
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Products\Entities\ProductCategory withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\ProductCategory whereCompanyId($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace Modules\Testimonials\Entities{
/**
 * Modules\Testimonials\Entities\Testimonial
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $contact_id
 * @property int|null $company_id
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @property-read \Modules\Products\Entities\Product|null $product
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\Testimonial onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\Testimonial withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\Testimonial withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $testimonial_title
 * @property string|null $testimonial
 * @property string|null $testimonial_video
 * @property string|null $testimonial_video_comment
 * @property string|null $tr_personalbenefit
 * @property string|null $tr_professionalbenefit
 * @property string|null $tr_problem
 * @property string|null $th_goal
 * @property string|null $th_lifebefore
 * @property string|null $th_lifeafter
 * @property string|null $th_evidenceafter
 * @property string|null $th_experience
 * @property string|null $likedmost
 * @property string|null $likedleast
 * @property int|null $grade
 * @property string|null $tomake10
 * @property int|null $NPS
 * @property string|null $sig_name
 * @property string|null $sig_tagline
 * @property string|null $sig_email
 * @property string|null $sig_site
 * @property string|null $sig_profession
 * @property string|null $sig_country
 * @property string|null $sig_city
 * @property \Illuminate\Support\Carbon|null $sig_date
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property int|null $usage_id
 * @property int|null $nps_id
 * @property int|null $vip_id
 * @property int|null $status_id
 * @property int|null $product_group_id
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read \Modules\Testimonials\Entities\TestimonialNpsType|null $nps
 * @property-read \Modules\Testimonials\Entities\TestimonialProductGroup|null $productGroup
 * @property-read \Modules\Testimonials\Entities\TestimonialStatusType|null $status
 * @property-read \Modules\Testimonials\Entities\TestimonialUsageType|null $usage
 * @property-read \Modules\Testimonials\Entities\TestimonialVipType|null $vip
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereLikedleast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereLikedmost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereNPS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereNpsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereProductGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereSigTagline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTestimonial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTestimonialTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTestimonialVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTestimonialVideoComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereThEvidenceafter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereThExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereThGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereThLifeafter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereThLifebefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTomake10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTrPersonalbenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTrProblem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereTrProfessionalbenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereUsageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\Testimonial whereVipId($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace Modules\Testimonials\Entities{
/**
 * Modules\Testimonials\Entities\TestimonialVipType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialVipType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialVipType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialVipType onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialVipType query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialVipType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialVipType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialVipType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialVipType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialVipType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialVipType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialVipType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialVipType withoutTrashed()
 */
	class TestimonialVipType extends \Eloquent {}
}

namespace Modules\Testimonials\Entities{
/**
 * Modules\Testimonials\Entities\TestimonialNpsType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialNpsType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialNpsType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialNpsType onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialNpsType query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialNpsType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialNpsType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialNpsType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialNpsType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialNpsType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialNpsType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialNpsType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialNpsType withoutTrashed()
 */
	class TestimonialNpsType extends \Eloquent {}
}

namespace Modules\Testimonials\Entities{
/**
 * Modules\Testimonials\Entities\TestimonialProductGroup
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialProductGroup newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialProductGroup newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialProductGroup query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialProductGroup withoutTrashed()
 */
	class TestimonialProductGroup extends \Eloquent {}
}

namespace Modules\Testimonials\Entities{
/**
 * Modules\Testimonials\Entities\TestimonialUsageType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialUsageType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialUsageType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialUsageType onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialUsageType query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialUsageType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialUsageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialUsageType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialUsageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialUsageType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialUsageType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialUsageType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialUsageType withoutTrashed()
 */
	class TestimonialUsageType extends \Eloquent {}
}

namespace Modules\Testimonials\Entities{
/**
 * Modules\Testimonials\Entities\TestimonialStatusType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialStatusType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialStatusType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialStatusType onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Testimonials\Entities\TestimonialStatusType query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialStatusType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialStatusType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialStatusType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialStatusType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialStatusType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Testimonials\Entities\TestimonialStatusType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialStatusType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Testimonials\Entities\TestimonialStatusType withoutTrashed()
 */
	class TestimonialStatusType extends \Eloquent {}
}

namespace Modules\Invoices\Entities{
/**
 * Modules\Invoices\Entities\InvoiceRow
 *
 * @property int $id
 * @property string|null $product_name
 * @property int $invoice_id
 * @property float|null $price
 * @property float|null $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read mixed $line_total
 * @property-read \Modules\Invoices\Entities\Invoice $invoice
 * @property-read \Modules\Products\Entities\Product $product
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRow onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRow withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRow withoutTrashed()
 * @mixin \Eloquent
 * @property int|null $product_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow whereProductId($value)
 * @property int|null $price_list_id
 * @property-read \Modules\Products\Entities\PriceList|null $priceList
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRow wherePriceListId($value)
 */
	class InvoiceRow extends \Eloquent {}
}

namespace Modules\Invoices\Entities{
/**
 * Modules\Invoices\Entities\InvoiceRecurringPeriod
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $system_name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Invoices\Entities\InvoiceRecurringPeriod newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Invoices\Entities\InvoiceRecurringPeriod newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Invoices\Entities\InvoiceRecurringPeriod query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereSystemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceRecurringPeriod withoutTrashed()
 * @mixin \Eloquent
 */
	class InvoiceRecurringPeriod extends \Eloquent {}
}

namespace Modules\Invoices\Entities{
/**
 * Modules\Invoices\Entities\Invoice
 *
 * @property int $id
 * @property string|null $invoice_number
 * @property int|null $order_id
 * @property string|null $customer_no
 * @property int|null $contact_id
 * @property int|null $account_id
 * @property string|null $invoice_date
 * @property string|null $due_date
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $invoice_status_id
 * @property string|null $from_company
 * @property string|null $from_tax_number
 * @property string|null $from_street
 * @property string|null $from_city
 * @property string|null $from_state
 * @property string|null $from_country
 * @property string|null $from_zip_code
 * @property string|null $bill_to
 * @property string|null $bill_tax_number
 * @property string|null $bill_street
 * @property string|null $bill_state
 * @property string|null $bill_country
 * @property string|null $bill_zip_code
 * @property string|null $ship_to
 * @property string|null $ship_tax_number
 * @property string|null $ship_street
 * @property string|null $ship_state
 * @property string|null $ship_country
 * @property string|null $ship_zip_code
 * @property string|null $terms_and_cond
 * @property string|null $notes
 * @property float|null $discount
 * @property int|null $currency_id
 * @property int|null $tax_id
 * @property float|null $paid
 * @property string|null $account_number
 * @property float|null $delivery_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $bill_city
 * @property string|null $ship_city
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @property-read mixed $balance_due
 * @property-read mixed $gross_value
 * @property-read string $subtotal
 * @property-read string $tax_value
 * @property-read \Modules\Invoices\Entities\InvoiceStatus|null $invoiceStatus
 * @property-read \Modules\Orders\Entities\Order|null $order
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Invoices\Entities\InvoiceRow[] $rows
 * @property-read \Modules\Platform\Settings\Entities\Tax|null $tax
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\Invoice onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereCustomerNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereDeliveryCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereInvoiceStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereTermsAndCond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\Invoice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\Invoice withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice query()
 * @property int|null $from_country_id
 * @property int|null $bill_country_id
 * @property int|null $ship_country_id
 * @property-read \Modules\Platform\Settings\Entities\Country|null $billCountry
 * @property-read \Modules\Platform\Settings\Entities\Country|null $fromCountry
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Invoices\Entities\Invoice[] $owner
 * @property-read \Modules\Platform\Settings\Entities\Country|null $shipCountry
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereBillCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereFromCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereShipCountryId($value)
 * @property string|null $send_invoice_to
 * @property int $is_recurring
 * @property int|null $recurring_every
 * @property int|null $recurring_period_id
 * @property-read \Modules\Invoices\Entities\InvoiceRecurringPeriod|null $recurringPeriod
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereIsRecurring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereRecurringEvery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereRecurringPeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\Invoice whereSendInvoiceTo($value)
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $rows_count
 */
	class Invoice extends \Eloquent {}
}

namespace Modules\Invoices\Entities{
/**
 * Modules\Invoices\Entities\InvoiceStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Invoices\Entities\InvoiceStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus query()
 * @property int|null $company_id
 * @property string|null $system_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Invoices\Entities\InvoiceStatus whereSystemName($value)
 */
	class InvoiceStatus extends \Eloquent {}
}

namespace Modules\Quotes\Entities{
/**
 * Modules\Quotes\Entities\QuoteStage
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteStage onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteStage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteStage withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteStage whereCompanyId($value)
 */
	class QuoteStage extends \Eloquent {}
}

namespace Modules\Quotes\Entities{
/**
 * Modules\Quotes\Entities\QuoteCarrier
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteCarrier onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteCarrier withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteCarrier withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteCarrier whereCompanyId($value)
 */
	class QuoteCarrier extends \Eloquent {}
}

namespace Modules\Quotes\Entities{
/**
 * Modules\Quotes\Entities\Quote
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property string|null $valid_unitl
 * @property string|null $shipping
 * @property int|null $quote_stage_id
 * @property int|null $quote_carrier_id
 * @property string|null $street
 * @property string|null $state
 * @property string|null $country
 * @property string|null $zip_code
 * @property string|null $notes
 * @property float|null $discount
 * @property int|null $currency_id
 * @property int|null $tax_id
 * @property float|null $delivery_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $contact_id
 * @property int|null $account_id
 * @property string|null $city
 * @property float|null $amount
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @property-read mixed $gross_value
 * @property-read string $subtotal
 * @property-read string $tax_value
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Modules\Quotes\Entities\QuoteCarrier|null $quoteCarrier
 * @property-read \Modules\Quotes\Entities\QuoteStage|null $quoteStage
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Quotes\Entities\QuoteRow[] $rows
 * @property-read \Modules\Platform\Settings\Entities\Tax|null $tax
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\Quote onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereDeliveryCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereQuoteCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereQuoteStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereValidUnitl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\Quote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\Quote withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote query()
 * @property int|null $country_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Quotes\Entities\Quote[] $owner
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\Quote whereCountryId($value)
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $rows_count
 */
	class Quote extends \Eloquent {}
}

namespace Modules\Quotes\Entities{
/**
 * Modules\Quotes\Entities\QuoteRow
 *
 * @property int $id
 * @property string|null $product_name
 * @property int $quote_id
 * @property float|null $price
 * @property float|null $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property int|null $product_id
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read mixed $line_total
 * @property-read \Modules\Products\Entities\Product|null $product
 * @property-read \Modules\Quotes\Entities\Quote $quote
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteRow onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteRow withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Quotes\Entities\QuoteRow withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Quotes\Entities\QuoteRow query()
 */
	class QuoteRow extends \Eloquent {}
}

namespace Modules\Leads\Entities{
/**
 * Class LeadIndustry
 *
 * @package Modules\Leads\Entities
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadIndustry onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadIndustry withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadIndustry withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadIndustry whereCompanyId($value)
 */
	class LeadIndustry extends \Eloquent {}
}

namespace Modules\Leads\Entities{
/**
 * Class LeadStatus
 *
 * @package Modules\Leads\Entities
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus query()
 * @property string|null $icon
 * @property string|null $color
 * @property int|null $company_id
 * @property string|null $system_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadStatus whereSystemName($value)
 */
	class LeadStatus extends \Eloquent {}
}

namespace Modules\Leads\Entities{
/**
 * Class Lead
 *
 * @package Modules\Leads\Entities
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $full_name
 * @property string|null $email
 * @property string|null $fax
 * @property string|null $annual_revenue
 * @property string|null $website
 * @property string|null $no_of_employees
 * @property string|null $skype
 * @property string|null $lead_company
 * @property string|null $job_title
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $secondary_email
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $description
 * @property string|null $addr_street
 * @property string|null $addr_state
 * @property string|null $addr_country
 * @property string|null $addr_city
 * @property string|null $addr_zip
 * @property int|null $lead_status_id
 * @property int|null $lead_source_id
 * @property int|null $lead_industry_id
 * @property int|null $lead_rating_id
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Campaigns\Entities\Campaign[] $campaigns
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Documents\Entities\Document[] $documents
 * @property-read \Modules\Leads\Entities\LeadIndustry|null $leadIndustry
 * @property-read \Modules\Leads\Entities\LeadRating|null $leadRating
 * @property-read \Modules\Leads\Entities\LeadSource|null $leadSource
 * @property-read \Modules\Leads\Entities\LeadStatus|null $leadStatus
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\Product[] $products
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\Lead onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereAddrCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereAddrCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereAddrState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereAddrStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereAddrZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereAnnualRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereLeadCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereLeadIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereLeadRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereLeadSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereLeadStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereNoOfEmployees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereSecondaryEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereSkype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\Lead withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\Lead withoutTrashed()
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $capture_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Calls\Entities\Call[] $calls
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereCaptureDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead query()
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property int|null $language_id
 * @property int|null $referral_id
 * @property int|null $addr_country_id
 * @property-read \Modules\Platform\Settings\Entities\Country|null $addrCountry
 * @property-read \Modules\Contacts\Entities\CustomerLanguage|null $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LeadEmails\Entities\LeadEmail[] $leadEmails
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Leads\Entities\Lead[] $owner
 * @property-read \Modules\Leads\Entities\Lead|null $referral
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereAddrCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\Lead whereReferralId($value)
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $calls_count
 * @property-read int|null $campaigns_count
 * @property-read int|null $comments_count
 * @property-read int|null $documents_count
 * @property-read int|null $lead_emails_count
 * @property-read int|null $products_count
 */
	class Lead extends \Eloquent {}
}

namespace Modules\Leads\Entities{
/**
 * Class LeadRating
 *
 * @package Modules\Leads\Entities
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadRating onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadRating withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadRating withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadRating whereCompanyId($value)
 */
	class LeadRating extends \Eloquent {}
}

namespace Modules\Leads\Entities{
/**
 * Class LeadSource
 *
 * @package Modules\Leads\Entities
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadSource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadSource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Leads\Entities\LeadSource withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Leads\Entities\LeadSource whereCompanyId($value)
 */
	class LeadSource extends \Eloquent {}
}

namespace Modules\PolizzaCar\Entities{
/**
 * Modules\PolizzaCar\Entities\PolizzaCarCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarCategory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarCategory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarCategory withoutTrashed()
 */
	class PolizzaCarCategory extends \Eloquent {}
}

namespace Modules\PolizzaCar\Entities{
/**
 * Modules\PolizzaCar\Entities\PolizzaCarWorksType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarWorksType withoutTrashed()
 */
	class PolizzaCarWorksType extends \Eloquent {}
}

namespace Modules\PolizzaCar\Entities{
/**
 * Modules\PolizzaCar\Entities\PianoTariffario
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $mm_24
 * @property float|null $mm_36
 * @property float|null $tax_rate
 * @property float|null $commission
 * @property float|null $car_p1_limit
 * @property float|null $car_p2_limit
 * @property float|null $car_p3_limit
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PianoTariffario newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PianoTariffario newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PianoTariffario onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PianoTariffario query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereCarP1Limit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereCarP2Limit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereCarP3Limit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereMm24($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereMm36($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PianoTariffario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PianoTariffario withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PianoTariffario withoutTrashed()
 */
	class PianoTariffario extends \Eloquent {}
}

namespace Modules\PolizzaCar\Entities{
/**
 * Modules\PolizzaCar\Entities\PolizzaCarStatus
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $color
 * @property string|null $icon
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarStatus newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarStatus query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarStatus withoutTrashed()
 */
	class PolizzaCarStatus extends \Eloquent {}
}

namespace Modules\PolizzaCar\Entities{
/**
 * Modules\PolizzaCar\Entities\PolizzaCarProcurement
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $company_name
 * @property string|null $company_vat
 * @property string|null $company_email
 * @property string|null $company_phone
 * @property string|null $company_address
 * @property string|null $company_city
 * @property string|null $company_cap
 * @property string|null $company_provincia
 * @property int|null $country_id
 * @property string|null $works_type_id
 * @property string|null $works_type_details
 * @property string|null $works_duration_dd
 * @property string|null $works_duration_mm
 * @property string|null $works_place_city
 * @property string|null $works_place_pr
 * @property float|null $procurement_total
 * @property string|null $insurance_policy
 * @property string|null $subject_procurement
 * @property string|null $company_activity
 * @property string|null $referente_name
 * @property string|null $referente_email
 * @property string|null $referente_phone
 * @property string|null $contract_code
 * @property string|null $works_descr
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Platform\Settings\Entities\Country|null $country
 * @property-read \Modules\PolizzaCar\Entities\PolizzaCarWorksType|null $works_type
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyCap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCompanyVat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereContractCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereInsurancePolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereProcurementTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereReferenteEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereReferenteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereReferentePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereSubjectProcurement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereWorksDescr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereWorksDurationDd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereWorksDurationMm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereWorksPlaceCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereWorksPlacePr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereWorksTypeDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement whereWorksTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCarProcurement withoutTrashed()
 */
	class PolizzaCarProcurement extends \Eloquent {}
}

namespace Modules\PolizzaCar\Entities{
/**
 * Modules\PolizzaCar\Entities\PolizzaCar
 *
 * @property int $id
 * @property int|null $buyer_id
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $procurement_id
 * @property int|null $status_id
 * @property \Illuminate\Support\Carbon|null $date_request
 * @property \Illuminate\Support\Carbon|null $policy_effect_date
 * @property \Illuminate\Support\Carbon|null $policy_expire_date
 * @property \Illuminate\Support\Carbon|null $order_sent_at
 * @property string|null $envelope_id
 * @property string|null $company_name
 * @property string|null $company_address
 * @property string|null $company_email
 * @property string|null $company_phone
 * @property string|null $company_city
 * @property string|null $company_cap
 * @property string|null $company_provincia
 * @property string|null $company_vat
 * @property int|null $country_id
 * @property string|null $contract_code
 * @property int|null $works_type_details
 * @property string|null $works_descr
 * @property string|null $works_duration_dd
 * @property string|null $works_duration_mm
 * @property string|null $works_place_city
 * @property string|null $works_place_pr
 * @property string|null $works_place_region
 * @property float|null $car_p1_limit_amount
 * @property float|null $car_p2_limit_amount
 * @property float|null $car_p3_limit_amount
 * @property float|null $car_p1_premium_gross
 * @property float|null $car_p2_premium_gross
 * @property float|null $car_p3_premium_gross
 * @property float|null $car_p1_premium_net
 * @property float|null $car_p2_premium_net
 * @property float|null $car_p3_premium_net
 * @property float|null $car_rateo_imponibile
 * @property float|null $car_rateo_tasse
 * @property float|null $car_rateo_lordo
 * @property float|null $car_tax_rate
 * @property int|null $risk_id
 * @property string|null $coeff_tariffa
 * @property string|null $tax_rate
 * @property int $group_id
 * @property string|null $pdf_signed_contract
 * @property string|null $pdf_payment_proof
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read int|null $activity_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read int|null $attachments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Platform\Settings\Entities\Country|null $country
 * @property-read mixed $car_civil_liability
 * @property-read string $partite_total
 * @property-read mixed $sezione_b_terms
 * @property-read mixed $total_gross
 * @property-read mixed $total_net
 * @property-read \Modules\PolizzaCar\Entities\PolizzaCar|null $ownedBy
 * @property-read \Modules\PolizzaCar\Entities\PolizzaCar|null $owner
 * @property-read \Modules\PolizzaCar\Entities\PolizzaCarProcurement|null $procurement
 * @property-read \Modules\PolizzaCar\Entities\PolizzaCarStatus|null $status
 * @property-read \Modules\PolizzaCar\Entities\PianoTariffario|null $tariffa
 * @property-read \Modules\PolizzaCar\Entities\PolizzaCarWorksType|null $works_type
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCar onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP1LimitAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP1PremiumGross($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP1PremiumNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP2LimitAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP2PremiumGross($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP2PremiumNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP3LimitAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP3PremiumGross($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarP3PremiumNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarRateoImponibile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarRateoLordo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarRateoTasse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCarTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCoeffTariffa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyCap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCompanyVat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereContractCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereDateRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereEnvelopeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereOrderSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar wherePdfPaymentProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar wherePdfSignedContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar wherePolicyEffectDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar wherePolicyExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereProcurementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereRiskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereWorksDescr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereWorksDurationDd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereWorksDurationMm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereWorksPlaceCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereWorksPlacePr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereWorksPlaceRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\PolizzaCar\Entities\PolizzaCar whereWorksTypeDetails($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCar withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\PolizzaCar\Entities\PolizzaCar withoutTrashed()
 */
	class PolizzaCar extends \Eloquent {}
}

namespace Modules\Contacts\Entities{
/**
 * Modules\Contacts\Entities\Contact
 *
 * @property int $id
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $job_title
 * @property string|null $department
 * @property int|null $contact_status_id
 * @property int|null $contact_source_id
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $fax
 * @property string|null $assistant_name
 * @property string|null $assistant_phone
 * @property string|null $street
 * @property string|null $state
 * @property string|null $country
 * @property string|null $zip_code
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $account_id
 * @property string|null $city
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Assets\Entities\Asset[] $assets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Campaigns\Entities\Campaign[] $campaigns
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Contacts\Entities\ContactSource|null $contactSource
 * @property-read \Modules\Contacts\Entities\ContactStatus|null $contactStatus
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Deals\Entities\Deal[] $deals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Documents\Entities\Document[] $documents
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Invoices\Entities\Invoice[] $invoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Orders\Entities\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Quotes\Entities\Quote[] $quotes
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Tickets\Entities\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\Contact onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereAssistantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereAssistantPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereContactSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereContactStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereSecondaryEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\Contact withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Calls\Entities\Call[] $calls
 * @property string|null $tags
 * @property string|null $profile_image
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Contacts\Entities\ContactEmail[] $emails
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereTags($value)
 * @property int|null $use_profile_image
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property int|null $language_id
 * @property int|null $referral_id
 * @property int|null $country_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\ContactEmails\Entities\ContactEmail[] $contactEmails
 * @property-read \Modules\Contacts\Entities\CustomerLanguage|null $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Contacts\Entities\Contact[] $owner
 * @property-read \Modules\Contacts\Entities\Contact|null $referral
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereReferralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact whereUseProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\Contact withAnyTagsOfAnyType($tags)
 * @property-read int|null $activity_count
 * @property-read int|null $assets_count
 * @property-read int|null $attachments_count
 * @property-read int|null $calls_count
 * @property-read int|null $campaigns_count
 * @property-read int|null $comments_count
 * @property-read int|null $contact_emails_count
 * @property-read int|null $deals_count
 * @property-read int|null $documents_count
 * @property-read int|null $invoices_count
 * @property-read int|null $orders_count
 * @property-read int|null $products_count
 * @property-read int|null $quotes_count
 * @property-read int|null $tags_count
 * @property-read int|null $tickets_count
 */
	class Contact extends \Eloquent {}
}

namespace Modules\Contacts\Entities{
/**
 * Modules\Contacts\Entities\CustomerLanguage
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Contacts\Entities\CustomerLanguage newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Contacts\Entities\CustomerLanguage newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\CustomerLanguage onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Contacts\Entities\CustomerLanguage query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\CustomerLanguage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\CustomerLanguage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\CustomerLanguage withoutTrashed()
 * @mixin \Eloquent
 */
	class CustomerLanguage extends \Eloquent {}
}

namespace Modules\Contacts\Entities{
/**
 * Modules\Contacts\Entities\ContactSource
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\ContactSource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\ContactSource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\ContactSource withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource query()
 * @property string|null $icon
 * @property string|null $color
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactSource whereIcon($value)
 */
	class ContactSource extends \Eloquent {}
}

namespace Modules\Contacts\Entities{
/**
 * Modules\Contacts\Entities\ContactStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\ContactStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\ContactStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Contacts\Entities\ContactStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus query()
 * @property string|null $icon
 * @property string|null $color
 * @property int|null $company_id
 * @property string|null $system_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Contacts\Entities\ContactStatus whereSystemName($value)
 */
	class ContactStatus extends \Eloquent {}
}

namespace Modules\Platform\Settings\Tags{
/**
 * Tags by Spatie - Modified. Remove translation added support for mariadb.
 * 
 * Class Tag
 *
 * @package Modules\Platform\Settings\Tags
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int|null $order_column
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag containing($name)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag withType($type = null)
 * @mixin \Eloquent
 */
	class Tag extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Class Country
 *
 * @package Modules\Platform\Settings\Entities
 * @property int $id
 * @property string $name
 * @property string|null $alpha2
 * @property string|null $alpha3
 * @property string|null $continent
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Country newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Country newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Country onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Country query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereAlpha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereAlpha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereContinent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Country withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Country withoutTrashed()
 * @mixin \Eloquent
 */
	class Country extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Modules\Platform\Settings\Entities\Province
 *
 * @property int $id
 * @property string $name
 * @property string|null $abbr_prov
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Province newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Province newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Province onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\Province query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Province whereAbbrProv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Province whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Province whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Province whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Province withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Province withoutTrashed()
 */
	class Province extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Modules\Platform\Settings\Entities\VaanceTags
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property int|null $order_column
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag containing($name)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\VaanceTags whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Tags\Tag withType($type = null)
 * @mixin \Eloquent
 */
	class VaanceTags extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Modules\Platform\Settings\Entities\Tax
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $tax_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Tax onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax whereTaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Tax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Tax withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Tax whereCompanyId($value)
 */
	class Tax extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Class EmailTemplate
 *
 * @package Modules\Platform\Settings\Entities
 * @property int $id
 * @property string|null $name
 * @property string|null $subject
 * @property string|null $message
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\EmailTemplate newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\EmailTemplate newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\EmailTemplate onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\EmailTemplate query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\EmailTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\EmailTemplate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\EmailTemplate withoutTrashed()
 * @mixin \Eloquent
 */
	class EmailTemplate extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Modules\Platform\Settings\Entities\Currency
 *
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Currency onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Currency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Currency withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Currency whereCompanyId($value)
 */
	class Currency extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Modules\Platform\Settings\Entities\Language
 *
 * @property int $id
 * @property string $name
 * @property string $language_key
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Language onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language whereLanguageKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Language withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\Language withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\Language query()
 */
	class Language extends \Eloquent {}
}

namespace Modules\Platform\Settings\Entities{
/**
 * Class SubscriptionCurrency
 *
 * @package Modules\Platform\Settings\Entities
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\SubscriptionCurrency newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\SubscriptionCurrency newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Platform\Settings\Entities\SubscriptionCurrency query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Settings\Entities\SubscriptionCurrency withoutTrashed()
 * @mixin \Eloquent
 */
	class SubscriptionCurrency extends \Eloquent {}
}

namespace Modules\Platform\Core\Entities{
/**
 * Modules\Platform\Core\Entities\AdvancedViews
 *
 * @property int $id
 * @property string|null $view_name
 * @property string|null $module_name
 * @property int|null $is_public
 * @property int|null $is_accepted
 * @property int|null $is_default
 * @property int $company_id
 * @property string|null $defined_columns
 * @property string|null $filter_rules
 * @property int|null $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Modules\Platform\Companies\Entities\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereDefinedColumns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereFilterRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereIsAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereModuleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews whereViewName($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\AdvancedViews query()
 */
	class AdvancedViews extends \Eloquent {}
}

namespace Modules\Platform\Core\Entities{
/**
 * Cachable Model
 * 
 * Class CachableModel
 *
 * @package Modules\Platform\Core\Entities
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel query()
 */
	class CachableModel extends \Eloquent {}
}

namespace Modules\Platform\Core\Entities{
/**
 * Temporary table
 * 
 * Class CsvData
 *
 * @package Modules\Platform\Core\Entities
 * @property int $id
 * @property string $csv_filename
 * @property int $csv_header
 * @property string $csv_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData whereCsvData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData whereCsvFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData whereCsvHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CsvData query()
 */
	class CsvData extends \Eloquent {}
}

namespace Modules\Platform\Core\Entities{
/**
 * Class Comment
 *
 * @package Modules\Platform\Core\Entities
 * @property int $id
 * @property string|null $commentable_id
 * @property string|null $commentable_type
 * @property string|null $commented_id
 * @property string|null $commented_type
 * @property string $comment
 * @property bool $approved
 * @property float|null $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $parent_id
 * @property int $upvote
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commented
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereCommentedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereCommentedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment whereUpvote($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\Comment query()
 */
	class Comment extends \Eloquent {}
}

namespace Modules\Platform\User\Entities{
/**
 * Modules\Platform\User\Entities\TimeFormat
 *
 * @property int $id
 * @property string $name
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $js_details Javascript Date Format
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\TimeFormat onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat whereJsDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\TimeFormat withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\TimeFormat withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeFormat query()
 */
	class TimeFormat extends \Eloquent {}
}

namespace Modules\Platform\User\Entities{
/**
 * Modules\Platform\User\Entities\Group
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\User\Entities\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\Group onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\Group withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\Group withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Group query()
 * @property-read int|null $users_count
 */
	class Group extends \Eloquent {}
}

namespace Modules\Platform\User\Entities{
/**
 * Modules\Platform\User\Entities\DateFormat
 *
 * @property int $id
 * @property string $name
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $js_details Javascript Date Format
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\DateFormat onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat whereJsDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\DateFormat withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\DateFormat withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\DateFormat query()
 */
	class DateFormat extends \Eloquent {}
}

namespace Modules\Platform\User\Entities{
/**
 * Class User
 *
 * @package Modules\Platform\User\Entities
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $is_active
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $title
 * @property string|null $department
 * @property string|null $office_phone
 * @property string|null $mobile_phone
 * @property string|null $home_phone
 * @property string|null $signature
 * @property string|null $fax
 * @property string|null $secondary_email
 * @property int $left_panel_hide
 * @property string|null $theme
 * @property string|null $address_country
 * @property string|null $address_state
 * @property string|null $address_city
 * @property string|null $address_postal_code
 * @property string|null $address_street
 * @property int|null $time_format_id
 * @property int|null $date_format_id
 * @property string|null $time_zone
 * @property string|null $profile_pic_conf
 * @property string|null $profile_image_path
 * @property int|null $language_id
 * @property int $access_to_all_entity
 * @property string $name
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Platform\User\Entities\DateFormat|null $dateFormat
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\User\Entities\Group[] $groups
 * @property-read \Modules\Platform\Settings\Entities\Language|null $language
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read \Modules\Platform\User\Entities\TimeFormat|null $timeFormat
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User permission($permissions)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereAccessToAllEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereAddressCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereAddressCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereAddressPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereAddressState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereAddressStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereDateFormatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereHomePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereLeftPanelHide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereOfficePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereProfileImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereProfilePicConf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereSecondaryEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereTimeFormatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereTimeZone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\User withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User query()
 * @property string|null $provider
 * @property string|null $provider_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $loggedActivity
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereProviderId($value)
 * @property string|null $api_key
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\User whereApiKey($value)
 * @property-read int|null $activity_count
 * @property-read int|null $comments_count
 * @property-read int|null $groups_count
 * @property-read int|null $logged_activity_count
 * @property-read int|null $notifications_count
 * @property-read int|null $permissions_count
 * @property-read int|null $roles_count
 */
	class User extends \Eloquent {}
}

namespace Modules\Platform\User\Entities{
/**
 * Modules\Platform\User\Entities\Role
 *
 * @property int $id
 * @property string $display_name
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\User\Entities\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read int|null $permissions_count
 * @property-read int|null $users_count
 */
	class Role extends \Eloquent {}
}

namespace Modules\Platform\User\Entities{
/**
 * Modules\Platform\User\Entities\TimeZone
 *
 * @property int $id
 * @property string $name
 * @property string $php_timezone
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\TimeZone onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone wherePhpTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\TimeZone withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\User\Entities\TimeZone withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\User\Entities\TimeZone query()
 */
	class TimeZone extends \Eloquent {}
}

namespace Modules\Platform\MenuManager\Entities{
/**
 * Menu Entity
 * 
 * Class Menu
 *
 * @package Modules\Platform\MenuManager\Entities
 * @property int $id
 * @property int $order_by
 * @property string $url
 * @property string $label
 * @property string $icon
 * @property string|null $permission
 * @property int|null $parent_id
 * @property int $section
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $dont_translate
 * @property int|null $visibility
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\MenuManager\Entities\Menu[] $children
 * @property-read \Modules\Platform\MenuManager\Entities\Menu|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereDontTranslate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereOrderBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu wherePermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu whereVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\MenuManager\Entities\Menu query()
 * @property-read int|null $children_count
 */
	class Menu extends \Eloquent {}
}

namespace Modules\Platform\Companies\Entities{
/**
 * Modules\Platform\Companies\Entities\Company
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $is_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereIsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $user_limit
 * @property int|null $storage_limit
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereUserLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereStorageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company query()
 * @property int|null $plan_id
 * @property string|null $stripe_id
 * @property string|null $braintree_id
 * @property string|null $paypal_email
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property-read \Modules\Platform\Companies\Entities\CompanyPlan|null $plan
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Companies\Entities\CompanyPlan[] $subscriptionPlans
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereBraintreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereTrialEndsAt($value)
 * @property \Illuminate\Support\Carbon|null $subscription_valid_until
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Subscription\Entities\SubscriptionInvoice[] $subscriptionInvoices
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereSubscriptionValidUntil($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read int|null $subscription_invoices_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Companies\Entities\Company onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Companies\Entities\Company withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Platform\Companies\Entities\Company withoutTrashed()
 */
	class Company extends \Eloquent {}
}

namespace Modules\Platform\Companies\Entities{
/**
 * Modules\Platform\Companies\Entities\CompanyPlan
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $api_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_active
 * @property string|null $color
 * @property int $featured
 * @property int $is_free
 * @property float|null $price
 * @property string|null $period
 * @property float|null $tax_rate
 * @property string|null $tax_name
 * @property string|null $features_list
 * @property int|null $teams_limit
 * @property int|null $storage_limit
 * @property int $orderby
 * @property int $plan_type
 * @property int|null $currency_id
 * @property-read \Modules\Platform\Settings\Entities\SubscriptionCurrency|null $currency
 * @property-read mixed $can_purchase
 * @property-read mixed $full_price
 * @property-read mixed $full_price_cents
 * @property-read mixed $tax_value
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereApiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereFeaturesList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereIsFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereOrderby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan wherePlanType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereStorageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereTaxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereTeamsLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Companies\Entities\CompanyPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read int|null $permissions_count
 */
	class CompanyPlan extends \Eloquent {}
}

namespace Modules\Deals\Entities{
/**
 * Modules\Deals\Entities\DealStage
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\DealStage onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\DealStage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\DealStage withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealStage whereCompanyId($value)
 */
	class DealStage extends \Eloquent {}
}

namespace Modules\Deals\Entities{
/**
 * Modules\Deals\Entities\Deal
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property float|null $amount
 * @property string|null $closing_date
 * @property float|null $probability
 * @property float|null $expected_revenue
 * @property string|null $next_step
 * @property int|null $deal_stage_id
 * @property int|null $deal_business_type_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $account_id
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Campaigns\Entities\Campaign[] $campaigns
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Contacts\Entities\Contact[] $contacts
 * @property-read \Modules\Deals\Entities\DealBusinessType|null $dealBusinessType
 * @property-read \Modules\Deals\Entities\DealStage|null $dealStage
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Orders\Entities\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\Deal onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereClosingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereDealBusinessTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereDealStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereExpectedRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereNextStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereProbability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\Deal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\Deal withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\Deal query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Deals\Entities\Deal[] $owner
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $campaigns_count
 * @property-read int|null $comments_count
 * @property-read int|null $contacts_count
 * @property-read int|null $orders_count
 */
	class Deal extends \Eloquent {}
}

namespace Modules\Deals\Entities{
/**
 * Modules\Deals\Entities\DealBusinessType
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\DealBusinessType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\DealBusinessType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Deals\Entities\DealBusinessType withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Deals\Entities\DealBusinessType whereCompanyId($value)
 */
	class DealBusinessType extends \Eloquent {}
}

namespace Modules\Subscription\Entities{
/**
 * Class SubscriptionInvoice
 *
 * @package Modules\Subscription\Entities
 * @property int $id
 * @property string|null $product_name
 * @property string|null $invoice_number
 * @property \Illuminate\Support\Carbon|null $invoice_date
 * @property string|null $invoice_from
 * @property string|null $invoice_to
 * @property string|null $terms_and_cond
 * @property string|null $notes
 * @property float|null $price
 * @property float|null $tax_value
 * @property string|null $tax_description
 * @property string|null $currency_name
 * @property string|null $provider_name
 * @property string|null $provider_id
 * @property string|null $provider_status
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereInvoiceTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereProviderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTaxDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTermsAndCond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property float|null $tax_rate
 * @property int|null $status
 * @property string|null $plan_name
 * @property string|null $period
 * @property-read mixed $total
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Subscription\Entities\SubscriptionInvoice whereTaxRate($value)
 */
	class SubscriptionInvoice extends \Eloquent {}
}

namespace Modules\SentEmails\LaravelDatabaseEmails{
/**
 * Modules\SentEmails\LaravelDatabaseEmails\Email
 *
 * @property $id
 * @property $label
 * @property $recipient
 * @property $from
 * @property $cc
 * @property $bcc
 * @property $subject
 * @property $view
 * @property $variables
 * @property $body
 * @property $attachments
 * @property $attempts
 * @property $sending
 * @property $failed
 * @property $error
 * @property $encrypted
 * @property $scheduled_at
 * @property $sent_at
 * @property $delivered_at
 * @property $composed_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereAttachments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereBcc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereCc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereComposedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereEncrypted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereFailed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereSending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereVariables($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereView($value)
 * @mixin \Eloquent
 * @property int|null $campaign_id
 * @property int|null $email_campaign_id
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereEmailCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\LaravelDatabaseEmails\Email whereCompanyId($value)
 */
	class Email extends \Eloquent {}
}

namespace Modules\SentEmails\Entities{
/**
 * Modules\SentEmails\Entities\EmailContext
 *
 * @property int $id
 * @property int $email_id
 * @property int $entity_id
 * @property int $company_id
 * @property string $entity_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SentEmails\Entities\EmailContext onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SentEmails\Entities\EmailContext whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SentEmails\Entities\EmailContext withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SentEmails\Entities\EmailContext withoutTrashed()
 * @mixin \Eloquent
 */
	class EmailContext extends \Eloquent {}
}

namespace Modules\ContactMailinglists\Entities{
/**
 * Modules\ContactMailinglists\Entities\MailinglistDict
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\ContactMailinglists\Entities\MailinglistDict newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\ContactMailinglists\Entities\MailinglistDict newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\ContactMailinglists\Entities\MailinglistDict query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactMailinglists\Entities\MailinglistDict withoutTrashed()
 */
	class MailinglistDict extends \Eloquent {}
}

namespace Modules\ContactMailinglists\Entities{
/**
 * Modules\ContactMailinglists\Entities\ContactMailinglist
 *
 * @property int $id
 * @property int $contact_id
 * @property int|null $subscribe_email_id
 * @property int $mailinglist_id
 * @property string|null $subscribe_ip
 * @property string|null $subscribe_origin_page
 * @property string|null $subscribe_origin_id
 * @property string|null $subscribe_date
 * @property string|null $unsubscribe_date
 * @property int $company_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read int|null $attachments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Modules\Contacts\Entities\Contact $contact
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereMailinglistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereSubscribeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereSubscribeEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereSubscribeIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereSubscribeOriginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereSubscribeOriginPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereUnsubscribeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactMailinglists\Entities\ContactMailinglist whereUpdatedAt($value)
 */
	class ContactMailinglist extends \Eloquent {}
}

namespace Modules\ContactWebsites\Entities{
/**
 * Modules\ContactWebsites\Entities\WebsiteTypes
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\ContactWebsites\Entities\WebsiteTypes newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\ContactWebsites\Entities\WebsiteTypes newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\ContactWebsites\Entities\WebsiteTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\WebsiteTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\WebsiteTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\WebsiteTypes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\WebsiteTypes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 */
	class WebsiteTypes extends \Eloquent {}
}

namespace Modules\ContactWebsites\Entities{
/**
 * Modules\ContactWebsites\Entities\ContactWebsite
 *
 * @property int $id
 * @property int|null $type_id
 * @property string|null $url
 * @property int $contact_id
 * @property int $is_active
 * @property int $is_default
 * @property int $company_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read int|null $attachments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Modules\Contacts\Entities\Contact $contact
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactWebsites\Entities\ContactWebsite whereUrl($value)
 */
	class ContactWebsite extends \Eloquent {}
}

namespace Modules\LeadEmails\Entities{
/**
 * Modules\LeadEmails\Entities\LeadEmail
 *
 * @property int $id
 * @property string|null $email
 * @property int $is_default
 * @property int $is_active
 * @property int $is_marketing
 * @property int|null $lead_id
 * @property int|null $company_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Leads\Entities\Lead|null $lead
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\LeadEmails\Entities\LeadEmail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereIsMarketing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\LeadEmails\Entities\LeadEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\LeadEmails\Entities\LeadEmail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\LeadEmails\Entities\LeadEmail withoutTrashed()
 * @mixin \Eloquent
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 */
	class LeadEmail extends \Eloquent {}
}

namespace Modules\Accounts\Entities{
/**
 * Modules\Accounts\Entities\AccountRating
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountRating onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountRating withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountRating withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountRating whereCompanyId($value)
 */
	class AccountRating extends \Eloquent {}
}

namespace Modules\Accounts\Entities{
/**
 * Modules\Accounts\Entities\AccountType
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountType withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountType whereCompanyId($value)
 */
	class AccountType extends \Eloquent {}
}

namespace Modules\Accounts\Entities{
/**
 * Modules\Accounts\Entities\Account
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property string|null $website
 * @property string|null $account_number
 * @property float|null $annual_revenue
 * @property int|null $employees
 * @property int|null $account_type_id
 * @property int|null $account_industry_id
 * @property int|null $account_rating_id
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $secondary_email
 * @property string|null $fax
 * @property string|null $skype_id
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $zip_code
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $tax_number
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\AccountIndustry|null $accountIndustry
 * @property-read \Modules\Accounts\Entities\AccountRating|null $accountRating
 * @property-read \Modules\Accounts\Entities\AccountType|null $accountType
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Assets\Entities\Asset[] $assets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Campaigns\Entities\Campaign[] $campaigns
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Contacts\Entities\Contact[] $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Deals\Entities\Deal[] $deals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Documents\Entities\Document[] $documents
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Invoices\Entities\Invoice[] $invoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Orders\Entities\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Quotes\Entities\Quote[] $quotes
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\ServiceContracts\Entities\ServiceContract[] $serviceContracts
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Tickets\Entities\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\Account onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereAccountIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereAccountRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereAccountTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereAnnualRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereEmployees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereSecondaryEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereSkypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\Account withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\Account withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Calls\Entities\Call[] $calls
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account query()
 * @property int|null $country_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Accounts\Entities\Account[] $owner
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereCountryId($value)
 * @property string|null $extra_id
 * @property int|null $payment_currency_id
 * @property int|null $payment_condition_id
 * @property-read int|null $activity_count
 * @property-read int|null $assets_count
 * @property-read int|null $attachments_count
 * @property-read int|null $calls_count
 * @property-read int|null $campaigns_count
 * @property-read int|null $comments_count
 * @property-read int|null $contacts_count
 * @property-read int|null $deals_count
 * @property-read int|null $documents_count
 * @property-read int|null $invoices_count
 * @property-read int|null $orders_count
 * @property-read \Modules\Accounts\Entities\AccountPaymentCondition|null $paymentCondition
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $paymentCurrency
 * @property-read int|null $quotes_count
 * @property-read int|null $service_contracts_count
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account whereExtraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account wherePaymentConditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\Account wherePaymentCurrencyId($value)
 */
	class Account extends \Eloquent {}
}

namespace Modules\Accounts\Entities{
/**
 * Modules\Accounts\Entities\AccountPaymentCondition
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $numeric_value
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Accounts\Entities\AccountPaymentCondition newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Accounts\Entities\AccountPaymentCondition newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountPaymentCondition onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\Modules\Accounts\Entities\AccountPaymentCondition query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountPaymentCondition whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountPaymentCondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountPaymentCondition whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountPaymentCondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountPaymentCondition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountPaymentCondition whereNumericValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountPaymentCondition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountPaymentCondition withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountPaymentCondition withoutTrashed()
 */
	class AccountPaymentCondition extends \Eloquent {}
}

namespace Modules\Accounts\Entities{
/**
 * Modules\Accounts\Entities\AccountIndustry
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountIndustry onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountIndustry withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Accounts\Entities\AccountIndustry withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Accounts\Entities\AccountIndustry whereCompanyId($value)
 */
	class AccountIndustry extends \Eloquent {}
}

namespace Modules\ServiceContracts\Entities{
/**
 * Modules\ServiceContracts\Entities\ServiceContractPriority
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractPriority whereCompanyId($value)
 */
	class ServiceContractPriority extends \Eloquent {}
}

namespace Modules\ServiceContracts\Entities{
/**
 * Modules\ServiceContracts\Entities\ServiceContract
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $start_date
 * @property string|null $due_date
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $service_contract_priority_id
 * @property int|null $service_contract_status_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $account_id
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Documents\Entities\Document[] $documents
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Modules\ServiceContracts\Entities\ServiceContractPriority|null $serviceContractPriority
 * @property-read \Modules\ServiceContracts\Entities\ServiceContractStatus|null $serviceContractStatus
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContract onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereServiceContractPriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereServiceContractStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContract withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContract withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContract query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\ServiceContracts\Entities\ServiceContract[] $owner
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $documents_count
 */
	class ServiceContract extends \Eloquent {}
}

namespace Modules\ServiceContracts\Entities{
/**
 * Modules\ServiceContracts\Entities\ServiceContractStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ServiceContracts\Entities\ServiceContractStatus whereCompanyId($value)
 */
	class ServiceContractStatus extends \Eloquent {}
}

namespace Modules\ContactEmails\Entities{
/**
 * Modules\ContactEmails\Entities\ContactEmail
 *
 * @property int $id
 * @property string|null $email
 * @property int $is_default
 * @property int $is_active
 * @property int $is_marketing
 * @property int|null $contact_id
 * @property int|null $company_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactEmails\Entities\ContactEmail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereIsMarketing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactEmails\Entities\ContactEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactEmails\Entities\ContactEmail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactEmails\Entities\ContactEmail withoutTrashed()
 * @mixin \Eloquent
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 */
	class ContactEmail extends \Eloquent {}
}

namespace Modules\Campaigns\Entities{
/**
 * Modules\Campaigns\Entities\CampaignStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\CampaignStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\CampaignStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\CampaignStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus query()
 * @property string|null $icon
 * @property string|null $color
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignStatus whereIcon($value)
 */
	class CampaignStatus extends \Eloquent {}
}

namespace Modules\Campaigns\Entities{
/**
 * Modules\Campaigns\Entities\Campaign
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property string|null $product
 * @property int|null $target_audience
 * @property string|null $expected_close_date
 * @property string|null $sponsor
 * @property int|null $target_size
 * @property int|null $campaign_status_id
 * @property int|null $campaign_type_id
 * @property float|null $budget_cost
 * @property float|null $actual_budget
 * @property int|null $expected_response
 * @property float|null $expected_revenue
 * @property int|null $expected_sales_count
 * @property int|null $actual_sales_count
 * @property int|null $expected_response_count
 * @property int|null $actual_response_count
 * @property float|null $expected_roi
 * @property float|null $actual_roi
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Accounts\Entities\Account[] $accounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Modules\Campaigns\Entities\CampaignStatus|null $campaignStatus
 * @property-read \Modules\Campaigns\Entities\CampaignType|null $campaignType
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Contacts\Entities\Contact[] $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Deals\Entities\Deal[] $deals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Leads\Entities\Lead[] $leads
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\Campaign onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereActualBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereActualResponseCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereActualRoi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereActualSalesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereBudgetCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereCampaignStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereCampaignTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereExpectedCloseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereExpectedResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereExpectedResponseCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereExpectedRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereExpectedRoi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereExpectedSalesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereSponsor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereTargetAudience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereTargetSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\Campaign withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\Campaign withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\Campaign query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Campaigns\Entities\Campaign[] $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Campaigns\Entities\EmailCampaign[] $emailCampaigns
 * @property-read int|null $accounts_count
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $contacts_count
 * @property-read int|null $deals_count
 * @property-read int|null $email_campaigns_count
 * @property-read int|null $leads_count
 */
	class Campaign extends \Eloquent {}
}

namespace Modules\Campaigns\Entities{
/**
 * Modules\Campaigns\Entities\EmailCampaign
 *
 * @property int $id
 * @property string|null $subject
 * @property string|null $from
 * @property string|null $body
 * @property string|null $email_host
 * @property string|null $email_port
 * @property string|null $email_username
 * @property string|null $email_password
 * @property string|null $email_encryption
 * @property string|null $email_from_address
 * @property string|null $email_from_name
 * @property int $test_mode
 * @property string|null $email_test
 * @property int|null $leads_to_sent
 * @property int|null $contacts_to_sent
 * @property int|null $accounts_to_sent
 * @property int|null $campaign_id
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Campaigns\Entities\Campaign|null $campaign
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\EmailCampaign onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereAccountsToSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereContactsToSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailFromAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereEmailUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereLeadsToSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereTestMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\EmailCampaign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\EmailCampaign withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\EmailCampaign withoutTrashed()
 * @mixin \Eloquent
 */
	class EmailCampaign extends \Eloquent {}
}

namespace Modules\Campaigns\Entities{
/**
 * Modules\Campaigns\Entities\CampaignType
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\CampaignType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\CampaignType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Campaigns\Entities\CampaignType withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Campaigns\Entities\CampaignType whereCompanyId($value)
 */
	class CampaignType extends \Eloquent {}
}

namespace Modules\Documents\Entities{
/**
 * Modules\Documents\Entities\Document
 *
 * @property int $id
 * @property string $title
 * @property string|null $notes
 * @property int|null $document_type_id
 * @property int|null $document_status_id
 * @property int|null $document_category_id
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Accounts\Entities\Account[] $accounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Contacts\Entities\Contact[] $contacts
 * @property-read \Modules\Documents\Entities\DocumentCategory|null $documentCategory
 * @property-read \Modules\Documents\Entities\DocumentStatus|null $documentStatus
 * @property-read \Modules\Documents\Entities\DocumentType|null $documentType
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Leads\Entities\Lead[] $leads
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\ServiceContracts\Entities\ServiceContract[] $serviceContracts
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\Document onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereDocumentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereDocumentStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\Document withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\Document withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\Document query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Documents\Entities\Document[] $owner
 * @property-read int|null $accounts_count
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $contacts_count
 * @property-read int|null $leads_count
 * @property-read int|null $service_contracts_count
 */
	class Document extends \Eloquent {}
}

namespace Modules\Documents\Entities{
/**
 * Modules\Documents\Entities\DocumentStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentStatus whereCompanyId($value)
 */
	class DocumentStatus extends \Eloquent {}
}

namespace Modules\Documents\Entities{
/**
 * Modules\Documents\Entities\DocumentCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentCategory withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentCategory whereCompanyId($value)
 */
	class DocumentCategory extends \Eloquent {}
}

namespace Modules\Documents\Entities{
/**
 * Modules\Documents\Entities\DocumentType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Documents\Entities\DocumentType withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Documents\Entities\DocumentType whereCompanyId($value)
 */
	class DocumentType extends \Eloquent {}
}

namespace Modules\Orders\Entities{
/**
 * Modules\Orders\Entities\OrderCarrier
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderCarrier onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderCarrier withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderCarrier withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderCarrier whereCompanyId($value)
 */
	class OrderCarrier extends \Eloquent {}
}

namespace Modules\Orders\Entities{
/**
 * Modules\Orders\Entities\Order
 *
 * @property int $id
 * @property string|null $order_number
 * @property string|null $carrier_number
 * @property int|null $deal_id
 * @property string|null $customer_no
 * @property int|null $contact_id
 * @property int|null $account_id
 * @property string|null $purchase_order
 * @property string|null $due_date
 * @property string|null $order_date
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $order_status_id
 * @property int|null $order_carrier_id
 * @property string|null $bill_street
 * @property string|null $bill_state
 * @property string|null $bill_country
 * @property string|null $bill_zip_code
 * @property string|null $ship_street
 * @property string|null $ship_state
 * @property string|null $ship_country
 * @property string|null $ship_zip_code
 * @property string|null $terms_and_cond
 * @property string|null $notes
 * @property float|null $discount
 * @property int|null $currency_id
 * @property int|null $tax_id
 * @property float|null $paid
 * @property float|null $delivery_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $bill_city
 * @property string|null $ship_city
 * @property string|null $bill_to
 * @property string|null $bill_tax_number
 * @property string|null $ship_to
 * @property string|null $ship_tax_number
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @property-read \Modules\Platform\Settings\Entities\Currency|null $currency
 * @property-read \Modules\Deals\Entities\Deal|null $deal
 * @property-read mixed $balance_due
 * @property-read mixed $gross_value
 * @property-read string $subtotal
 * @property-read string $tax_value
 * @property-read \Modules\Orders\Entities\OrderCarrier|null $orderCarrier
 * @property-read \Modules\Orders\Entities\OrderStatus|null $orderStatus
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Orders\Entities\OrderRow[] $rows
 * @property-read \Modules\Platform\Settings\Entities\Tax|null $tax
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\Order onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereCarrierNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereCustomerNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereDeliveryCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereOrderCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order wherePurchaseOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereTermsAndCond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\Order withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order query()
 * @property int|null $bill_country_id
 * @property int|null $ship_country_id
 * @property-read \Modules\Platform\Settings\Entities\Country|null $billCountry
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Orders\Entities\Order[] $owner
 * @property-read \Modules\Platform\Settings\Entities\Country|null $shipCountry
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereBillCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\Order whereShipCountryId($value)
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 * @property-read int|null $rows_count
 */
	class Order extends \Eloquent {}
}

namespace Modules\Orders\Entities{
/**
 * Modules\Orders\Entities\OrderStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus query()
 * @property int|null $company_id
 * @property string|null $system_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereSystemName($value)
 * @property string|null $icon
 * @property string|null $color
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderStatus whereIcon($value)
 */
	class OrderStatus extends \Eloquent {}
}

namespace Modules\Orders\Entities{
/**
 * Modules\Orders\Entities\OrderRow
 *
 * @property int $id
 * @property string|null $product_name
 * @property int $order_id
 * @property float|null $price
 * @property float|null $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $company_id
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read mixed $line_total
 * @property-read \Modules\Orders\Entities\Order $order
 * @property-read \Modules\Products\Entities\Product $product
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderRow onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderRow withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Orders\Entities\OrderRow withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Orders\Entities\OrderRow query()
 */
	class OrderRow extends \Eloquent {}
}

namespace Modules\Assets\Entities{
/**
 * Modules\Assets\Entities\AssetStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetStatus whereCompanyId($value)
 */
	class AssetStatus extends \Eloquent {}
}

namespace Modules\Assets\Entities{
/**
 * Modules\Assets\Entities\AssetCategory
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetCategory withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetCategory whereCompanyId($value)
 */
	class AssetCategory extends \Eloquent {}
}

namespace Modules\Assets\Entities{
/**
 * Modules\Assets\Entities\AssetManufacturer
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetManufacturer onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetManufacturer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\AssetManufacturer withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\AssetManufacturer whereCompanyId($value)
 */
	class AssetManufacturer extends \Eloquent {}
}

namespace Modules\Assets\Entities{
/**
 * Modules\Assets\Entities\Asset
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $model_no
 * @property string|null $tag_number
 * @property string|null $order_number
 * @property string|null $purchase_date
 * @property float|null $purchase_cost
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $asset_status_id
 * @property int|null $asset_category_id
 * @property int|null $asset_manufacturer_id
 * @property int|null $supplier_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $contact_id
 * @property int|null $account_id
 * @property int|null $company_id
 * @property-read \Modules\Accounts\Entities\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Modules\Assets\Entities\AssetCategory|null $assetCategory
 * @property-read \Modules\Assets\Entities\AssetManufacturer|null $assetManufacturer
 * @property-read \Modules\Assets\Entities\AssetStatus|null $assetStatus
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\Platform\Companies\Entities\Company|null $company
 * @property-read \Modules\Contacts\Entities\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\Asset onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereAssetCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereAssetManufacturerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereAssetStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereModelNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset wherePurchaseCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereTagNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\Asset withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Assets\Entities\Asset withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Assets\Entities\Asset query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Assets\Entities\Asset[] $owner
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 */
	class Asset extends \Eloquent {}
}

namespace Modules\ContactRequests\Entities{
/**
 * Modules\ContactRequests\Entities\ContactRequest
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $organization_name
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $other_contact_method
 * @property string|null $custom_subject
 * @property string|null $contact_date
 * @property string|null $next_contact_date
 * @property string|null $owned_by_type
 * @property int|null $owned_by_id
 * @property int|null $status_id
 * @property int|null $preferred_id
 * @property int|null $contact_reason_id
 * @property int|null $company_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bnb\Laravel\Attachments\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Platform\Core\Entities\Comment[] $comments
 * @property-read \Modules\ContactRequests\Entities\ContactReason|null $contactReason
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $ownedBy
 * @property-read \Modules\ContactRequests\Entities\PreferredContactMethod|null $preferred
 * @property-read \Modules\ContactRequests\Entities\ContactRequestStatus|null $status
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactRequest onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereContactDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereContactReasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereCustomSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereNextContactDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereNotOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereOrganizationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereOtherContactMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereOwnedBy(\Cog\Contracts\Ownership\CanBeOwner $owner)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereOwnedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereOwnedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest wherePreferredId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactRequest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactRequest withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequest query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\ContactRequests\Entities\ContactRequest[] $owner
 * @property-read int|null $activity_count
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 */
	class ContactRequest extends \Eloquent {}
}

namespace Modules\ContactRequests\Entities{
/**
 * Modules\ContactRequests\Entities\ContactReason
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactReason onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactReason withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactReason withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactReason whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 */
	class ContactReason extends \Eloquent {}
}

namespace Modules\ContactRequests\Entities{
/**
 * Modules\ContactRequests\Entities\PreferredContactMethod
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\PreferredContactMethod whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 */
	class PreferredContactMethod extends \Eloquent {}
}

namespace Modules\ContactRequests\Entities{
/**
 * Modules\ContactRequests\Entities\ContactRequestStatus
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus query()
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ContactRequests\Entities\ContactRequestStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Platform\Core\Entities\CachableModel withCacheCooldownSeconds($seconds)
 */
	class ContactRequestStatus extends \Eloquent {}
}

