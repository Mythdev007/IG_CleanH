<?php

namespace Modules\Platform\Settings\Tags;

use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Collection as DbCollection;

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
class Tag extends Model implements Sortable
{
    use SortableTrait;

    public $guarded = [];

    public function scopeWithType(Builder $query, string $type = null): Builder
    {
        if (is_null($type)) {
            return $query;
        }

        return $query->where('type', $type)->orderBy('order_column');
    }

    public function scopeContaining(Builder $query, string $name): Builder
    {
        return $query->where('name','like',"%name%");
    }

    /**
     * @param $values
     * @param string|null $type
     * @return mixed|static
     */
    public static function findOrCreate($values, string $type = null)
    {
        $tags = collect($values)->map(function ($value) use ($type) {
            if ($value instanceof Tag) {
                return $value;
            }
            return static::findOrCreateFromString($value, $type);
        });

        return is_string($values) ? $tags->first() : $tags;
    }

    public static function getWithType(string $type): DbCollection
    {
        return static::withType($type)->orderBy('order_column')->get();
    }

    public static function findFromString(string $name, string $type = null)
    {

        return static::query()
            ->where("name", $name)
            ->where('type', $type)
            ->first();
    }

    public static function findFromStringOfAnyType(string $name)
    {

        return static::query()
            ->where("name", $name)
            ->first();
    }

    protected static function findOrCreateFromString(string $name, string $type = null): self
    {

        $tag = static::findFromString($name, $type);

        if (! $tag) {
            $tag = static::create([
                'name' => $name,
                'type' => $type,
            ]);
        }

        return $tag;
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute($key, $value);
    }
}
