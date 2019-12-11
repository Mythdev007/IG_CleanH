<?php

return [
    'setup' => [

        /**
         * Module Name
         */
        'module_name' => 'TestContacts',

        /**
         * Singular module Name
         */
        'singular_name' => 'TestContact',

        /**
         * If set to true. Visibility of records in module will be limited with "Assigned TO" field (User or Group)
         */
        'entity_private_access' => true,

        /**
         * Entities definition
         */
        'entity' => [
            'company' => [

                /**
                 * Entity name
                 */
                'name' => 'TestContact',

                /**
                 * Entity database table name
                 */
                'table' => 'test_companies',

                /**
                 * main - Main entity of module.
                 * settings - Dictionary entity of module
                 */
                'type' => 'main',

                /**
                 * HasMorphOwner trait will be added to entity
                 */
                'ownable' => true,

                /**
                 * LogsActivity trait will be added to entity
                 */
                'activity' => false,

                /**
                 * Commentable trait will be added to entity
                 */
                'comments' => false,

                /**
                 * HasAttachment trait will be added to entity
                 */
                'attachments' => false,

                'properties' => [

                    /**
                     * Definition of section in show|create|edit
                     */
                    'information' => [

                        /**
                         * Entity field (key is a name of field)
                         * type - type of entity.
                         * supported types:
                         * - string    - text filed (Normal input)
                         * - integer   - Integer field (Number field)
                         * - text      - Textarea field
                         * - ownedBy   - Required if use ownable trait (Dropdown)
                         * - manyToOne - Dictionary    (Dropdown)
                         * - date      - Date field    (Calendar)
                         * - email     - text field    (Text with validation)
                         * - decimal   - Decimal field (Number field)
                         * - datetime  - Date with time (calendar with time)
                         * - boolean   - Checkbox
                         *
                         * rules - rules generated in request object
                         */
                        'name' => [
                            'type' => 'string',
                            'rules' => 'required',
                        ],
                        'owned_by' => [
                            'type' => 'ownedBy'
                        ],
                        'employees' => [
                            'type' => 'string'
                        ],
                        'company_type_id' => [
                            'type' => 'manyToOne', // Relation Type
                            'relation' => 'companyType', // relation name
                            'display_column' => 'name', // Visible field in form and show view
                            'belongs_to' => 'CompanyType' // Belongs To
                        ],
                        'company_industry_id' => [
                            'type' => 'manyToOne',
                            'relation' => 'companyIndustry',
                            'display_column' => 'name',
                            'belongs_to' => 'CompanyIndustry'
                        ],
                        'company_rating_id' => [
                            'type' => 'manyToOne',
                            'relation' => 'companyRating',
                            'display_column' => 'name',
                            'belongs_to' => 'CompanyRating'
                        ]
                    ],
                    'address_information' => [
                        'street' => ['type' => 'string'],
                        'city' => ['type' => 'string'],
                        'state' => ['type' => 'string'],
                        'country' => ['type' => 'string'],
                        'zip_code' => ['type' => 'string'],
                    ],
                    'notes' => [
                        'notes' => ['type' => 'text'],
                    ]
                ]
            ],

            'company_type' => [
                'name' => 'CompanyType',
                'table' => 'companies_dict_type',
                'type' => 'settings',

                'insert_data' => [
                    'small_company',
                    'medium_company',
                    'big_company'
                ],
                'properties' => [
                    'detail' => [
                        'name' => [
                            'type' => 'string',
                        ],
                    ],
                ]
            ],

            'company_industry' => [
                'name' => 'CompanyIndustry',
                'table' => 'companies_dict_industry',
                'type' => 'settings',

                'insert_data' => [
                    'communications',
                    'technology',
                    'manufacturing'
                ],
                'properties' => [
                    'detail' => [
                        'name' => [
                            'type' => 'string',
                        ],
                    ],
                ]
            ],

            'company_rating' => [
                'name' => 'CompanyRating',
                'table' => 'companies_dict_rating',
                'type' => 'settings',

                'insert_data' => [
                    'acquired',
                    'active',
                    'market_failed',
                    'project_cancelled',
                    'shut_down'
                ],
                'properties' => [
                    'detail' => [
                        'name' => [
                            'type' => 'string',
                        ],
                    ],
                ]
            ],


        ]

    ]
];
