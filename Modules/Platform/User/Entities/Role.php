<?php
/**
 * Created by PhpStorm.
 * User: laravel-vaance.com
 * Date: 28.02.19
 * Time: 17:47
 */

namespace Modules\Platform\User\Entities;


use HipsterJazzbo\Landlord\BelongsToTenants;
use Spatie\Permission\Models\Role as SpatieRole;

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
 */
class Role extends SpatieRole
{

    const DEFAULT_COMPANY_ADMIN_ROLE = 'supervisor';

}
