<?php

namespace Modules\Platform\Settings\Repositories;

use Modules\Platform\Core\Repositories\PlatformRepository;
use Modules\Platform\Settings\Entities\PolizzaCar;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PolizzaCarRepository
 * @package Modules\Platform\Settings\Repositories
 */
class PolizzaCarRepository extends PlatformRepository
{
    public function model()
    {
        return PolizzaCar::class;
    }
}
