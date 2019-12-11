<?php

return [
    'name' => 'Tickets',

    'entity_private_access' => true,

    'advanced_views' => true,

    'qrcode_in_print' => true,

    /**
     * Always use lower name without custom characters, spaces, etc
     */
    'permissions' => [
        'support',
        'tickets.settings',
        'tickets.browse',
        'tickets.create',
        'tickets.update',
        'tickets.destroy'
    ]
];
