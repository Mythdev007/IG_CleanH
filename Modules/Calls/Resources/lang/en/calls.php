<?php

return [

    'module' => 'Calls',
    'module_description' => 'Call log with Leads, Contacts, Accounts',
    'create_new' => 'Log Call',
    'delete' => 'Delete',
    'edit' => 'Edit',
    'create' => 'Create',
    'back' => 'Back',
    'details' => 'Details',
    'list' => 'Calls list',
    'updated' => 'Calls updated',
    'created' => 'Calls created',

    'dict' => [
    ],

    'panel' => [
        'notes' => 'Notes',
        'information' => 'Information',
    ],

    'form' => [
        'direction_id' => 'Direction',
        'duration' => 'Duration',
        'notes' => 'Notes',
        'subject' => 'Subject',
        'call_date' => 'Call date',
        'phone_number' => 'Phone number',
        'owned_by' => 'Assigned To',
        'contact_id' => 'Contact',
        'account_id' => 'Account',
        'lead_id' => 'Lead',
        'direction' => 'Direction',
        'account_name' => 'Account',
        'contact_name' => 'Contact',
        'lead_name' => 'Lead',
        'status' => 'Status',
        'status_id' => 'Status'

    ],

    'table' => [
        'subject' => 'Subject',
        'phone_number' => 'Phone number',
        'call_date' => 'Call date',

    ],

    'settings' => [
        'directiontype' => 'Direction Type',
        'status' => 'Status'
    ],

    'directiontype' => [
        'module' => 'Direction Type',
        'module_description' => 'Manage call direction type',
        'panel' => [
            'details' => 'Details'
        ],
        'form' => [
            'name' => 'Name'
        ]
    ],

    'status' => [
        'module' => 'Status',
        'module_description' => 'Manage call status',
        'panel' => [
            'details' => 'Details'
        ],
        'form' => [
            'name' => 'Name'
        ]
    ]
];
