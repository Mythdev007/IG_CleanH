<?php

namespace Modules\Platform\Settings\Repositories;

use Modules\Platform\Core\Repositories\PlatformRepository;
use Modules\Platform\Settings\Entities\Currency;
use Modules\Platform\Settings\Entities\Language;
use Modules\Platform\Settings\Entities\SubscriptionCurrency;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SubscriptionCurrencyRepository
 * @package Modules\Platform\Settings\Repositories
 */
class SubscriptionCurrencyRepository extends PlatformRepository
{
    public function model()
    {
        return SubscriptionCurrency::class;
    }
}
