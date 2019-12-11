<?php

return [
    'name' => 'ContactMailinglists',

    'entity_private_access' => false,

    /**
     * Always use lower name without custom characters, spaces, etc
     */
    'permissions' => [
        'contactmailinglists.settings',
        'contactmailinglists.browse',
        'contactmailinglists.create',
        'contactmailinglists.update',
        'contactmailinglists.destroy'
    ]
];
