<?php

namespace Modules\Platform\Core\Helper;

/**
 * Theme Helper
 *
 * Class ThemeHelper
 * @package Modules\Platform\Core\Helper
 */
class ThemeHelper
{

    /**
     * Supported theme colors
     */
    const SUPPORTED_THEMES = [
        'theme-indigo' => 'Indigo',
        'theme-italgas' => 'Italgas',
    ];

    /**
     * Check if theme is active
     * @param $theme
     * @return string
     */
    public static function isActive($theme)
    {
        $auth = \Auth::user();

        if ($theme == $auth->theme()) {
            return 'active';
        }
    }
}
