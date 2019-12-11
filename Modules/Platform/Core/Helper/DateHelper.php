<?php

namespace Modules\Platform\Core\Helper;

use Carbon\Carbon;
use Modules\Platform\User\Entities\User;

/**
 * General Date Helper
 *
 * Class DateHelper
 * @package Modules\Platform\Core\Helper
 */
class DateHelper
{

    /**
     * Round minutes in date
     * @param $date
     * @param int $precision
     * @return false|string
     */
    public static function roundMinutesTo($date, $precision = 15)
    {
        $timestamp = strtotime($date);

        return date('Y-m-d H:i:s', round($timestamp / $precision) * $precision);
    }

    /**
     * Convert $date to UTC Time
     *
     * @param $date
     * @return null|string
     */
    public static function formatDateToUTC($date)
    {
        $auth = \Auth::user();

        if ($date != null && $auth->time_zone) {

            try{

                $parsed = Carbon::createFromFormat(UserHelper::userPHPDateFormat(), $date);
                return $parsed->setTimezone('UTC');

            }catch (\Exception $exception){
                try{

                    $date =  Carbon::parse($date,$auth->time_zone)->setTimezone('UTC');

                    return $date;

                }catch (\Exception $exception){
                    return null;
                }
            }

        }
        return null;
    }

    /**
     * Format Date & Time to UTC
     * @return null|string
     */
    public static function formatDateTimeToUTC($date)
    {
        $auth = \Auth::user();

        if ($date != null && $auth != null && $auth->time_zone) {
            $date = Carbon::parse($date, $auth->time_zone)->setTimezone('UTC')->format('Y-m-d H:i:s');

            return $date;
        }

        return $date;
    }
}
