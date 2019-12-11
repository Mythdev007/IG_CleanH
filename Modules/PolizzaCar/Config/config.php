<?php

return [
    'name' => 'PolizzaCar',

    'entity_private_access' => true,

    /**
     * Always use lower name without custom characters, spaces, etc
     */
    'permissions' => [
        'polizzacar.settings',
        'polizzacar.browse',
        'polizzacar.create',
        'polizzacar.update',
        'polizzacar.destroy',
        
        'procurement.browse',
        'procurement.create',
        'procurement.update',
        'procurement.destroy'
    ]
];
