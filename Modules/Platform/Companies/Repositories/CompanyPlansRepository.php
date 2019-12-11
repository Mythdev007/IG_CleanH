<?php

namespace Modules\Platform\Companies\Repositories;

use Modules\Platform\Companies\Entities\CompanyPlan;
use Modules\Platform\Core\Repositories\PlatformRepository;


/**
 * Class CompanyPlansRepository
 * @package Modules\Platform\Companies\Repositories
 */
class CompanyPlansRepository extends PlatformRepository
{
    public function model()
    {
        return CompanyPlan::class;
    }

    /**
     * Return all active plans
     * @return mixed
     */
    public function activePlans()
    {

        return $this->orderBy('orderby', 'asc')->findWhere([
            'is_active' => true
        ]);

    }

    /**
     * Return active plans except $planId
     * @param $planId
     * @return mixed
     */
    public function activePlansExcept($planId)
    {

        return $this->orderBy('orderby', 'asc')->findWhere([
            ['is_free','=', false],
            ['is_active','=', true],
            ['id','<>', $planId]
        ]);

    }

}
