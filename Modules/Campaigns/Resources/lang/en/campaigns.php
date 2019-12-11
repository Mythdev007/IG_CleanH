<?php

return [

    'module' => 'Campaigns',
    'module_description' => 'Campaigns allows you to collect information about Leads, Contacts, Deals and Accounts in one place',
    'delete' => 'Delete',
    'edit' => 'Edit',
    'create' => 'Create',
    'back' => 'Back',
    'details' => 'Details',
    'list' => 'Campaigns list',
    'updated' => 'Campaigns updated',
    'created' => 'Campaigns created',
    'create_new' => 'Create Campaign',
    'compose_campaign_email' => 'Create Email Campaign',
    'create_compose_campaign_email' => 'Create Email Campaign',
    'email_campaign_info' => "When in production mode. System support duplicate send protection. Same email are not sent to one same recipient more then one in single Email Campaign. Campaing is using CRON to send emails",

    'leads' => 'Leads',
    'contacts' => 'Contacts',
    'accounts' => 'Accounts',

    'no_leads_in_campaign' => 'No leads assigned in campaign',
    'no_contacts_in_campaign' => 'No contacts assigned in campaign',
    'no_accounts_in_campaign' => 'No accounts assigned in campaign',

    'widgets' => [
        'total' => 'Total',
        'new'   => 'New',
        'approved' => 'Approved',
        'in_progress' => 'In Progress',
        'test' => 'Test',
        'trash' => 'Trash'
    ],

    'dict' => [
        'conference' => 'Conference',
        'webinar' => 'Webinar',
        'trade_show' => 'Trade show',
        'public_relations' => 'Public relations',
        'partners' => 'Partners',
        'referral_program' => 'Referral program',
        'advertisement' => 'Advertisement',
        'banner_ads' => 'Banner ads',
        'direct_mail' => 'Direct mail',
        'telemarketing' => 'Telemarketing',
        'others' => 'Others',

        'planning' => 'Planning',
        'active' => 'Active',
        'inactive' => 'Inactive',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',

    ],

    'tabs' => [
        'leads' => 'Leads',
        'contacts' => 'Contacts',
        'deals' => 'Deals',
        'accounts' => 'Accounts',
        'campaign_sent_emails' => 'Email Campaigns'
    ],

    'panel' => [
        'information' => 'Basic information',
        'expectations_and_actuals' => 'Expectations and actuals',
        'notes' => 'Notes',
        'email_settings' => 'Email settings'
    ],

    'form' => [
        'name' => 'Name',
        'product' => 'Product',
        'target_audience' => 'Target audience',
        'close_date' => 'Close date',
        'expected_close_date' => 'Expected close date',
        'sponsor' => 'Sponsor',
        'target_size' => 'Target size',
        'campaign_status_id' => 'Status',
        'campaign_type_id' => 'Type',
        'budget_cost' => 'Budget cost',
        'actual_budget' => 'Actual budget',
        'expected_response' => 'Actual response',
        'expected_revenue' => 'Expected revenue',
        'expected_sales_count' => 'Expected sales count',
        'actual_sales_count' => 'Actual sales count',
        'expected_response_count' => 'Expected response count',
        'actual_response_count' => 'Actual response count',
        'expected_roi' => 'Expected ROI',
        'actual_roi' => 'Actual ROI',
        'notes' => 'Notes',
        'owned_by' => 'Assigned To',
        'type' => 'Type',
        'status' => 'Status',




        'email_host' => 'Email host',
        'email_port' => 'Email port',
        'email_username' => 'Email username',
        'email_password' => 'Email password',
        'email_encryption' => 'Email encryption',
        'email_from_address' => 'Email from address',
        'email_from_name' => 'Email from name',
        'test_mode' => 'Test Mode (Email will be sent to Test Email). Remember to add at at least one Lead, Contact or Account',
        'email_test' => 'Test email',
        'subject' => 'Subject',
        'body' => 'Body'

    ],

    'table' => [
        'product' => 'Product',
        'status' => 'Status',
        'type' => 'Type',
        'expected_close_date' => 'Expected close date',
        'sponsor' => 'Sponsor',

        'emails_to_sent' => 'Emails (All/Sent/Failed)',
        'subject' =>  'Subject'
    ],

    'settings' => [
        'status' => 'Status',
        'type' => 'Type'
    ],

    'status' => [
        'module' => 'Campaign status',
        'module_description' => 'Manage campaign status',
        'panel' => [
            'details' => 'Details'
        ],
        'form' => [
            'name' => 'Name',
            'icon' => 'Icon',
            'color' => 'Color'
        ]
    ],

    'type' => [
        'module' => 'Campaign type',
        'module_description' => 'Manage campaign type',
        'panel' => [
            'details' => 'Details'
        ],
        'form' => [
            'name' => 'Name'
        ]
    ]


];
