<?php
/**
 * Created by PhpStorm.
 * User: laravel-vaance.com
 * Date: 29.12.18
 * Time: 11:14
 */

namespace Modules\Platform\Settings\Entities;


use HipsterJazzbo\Landlord\BelongsToTenants;
use Modules\Platform\Settings\Tags\Tag;

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
class VaanceTags extends Tag
{
    use BelongsToTenants;

    public $table = 'tags';
}