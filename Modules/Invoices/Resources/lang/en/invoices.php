<?php

return [

    'module' => 'Invoices',
    'module_description' => 'Invoice is a bill issued to the Customer along with the goods or services.',
    'delete' => 'Delete',
    'edit' => 'Edit',
    'create' => 'Create',
    'create_new' => 'Create Invoice',
    'back' => 'Back',
    'details' => 'Details',
    'list' => 'Invoices list',
    'updated' => 'Invoices updated',
    'created' => 'Invoices created',

    'copy_from_shipping_address' => 'Copy From Shipping Address',
    'copy_from_company_settings' => 'Copy from settings',
    'copy_from_account' => 'Copy from Account',
    'copy_from_billing_address' => 'Copy From Billing Address',
    'print' => 'Print',

    'dict' => [
        'created' => 'Created',
        'cancel' => 'Cancel',
        'approved' => 'Approved',
        'sent' => 'Sent',
        'paid' => 'Paid'
    ],

    'panel' => [
        'information' => 'Basic information',
        'billing_address' => 'Billing address',
        'shipping_address' => 'Shipping address',
        'terms' => 'Terms and conditions',
        'notes' => 'Notes',
        'products_and_services' => 'Products & Services',
        'tax_and_currency' => 'Tax & Currency',
        'invoice_from' => 'Invoice from company',
        'recurring' => 'Recurring Invoice setup'

    ],

    'form' => [
        'invoice_number' => 'Invoice number',
        'order_id' => 'Order',
        'customer_no' => 'Customer NO',
        'contact_id' => 'Contact',
        'account_id' => 'Account',
        'invoice_date' => 'Invoice date',
        'due_date' => 'Due date',
        'invoice_status_id' => 'Status',

        'bill_to' => 'Bill To',
        'bill_tax_number' => 'Bill To tax number',
        'bill_street' => 'Bill street',
        'bill_country_id' => 'Bill country',
        'bill_state' => 'Bill state',
        'bill_city' => 'Bill city',
        'bill_zip_code' => 'Bill zip code',

        'ship_to' => 'Ship To',
        'ship_tax_number' => 'Ship To tax number',
        'ship_street' => 'Ship street',
        'ship_country_id' => 'Ship country',
        'ship_state' => 'Ship state',
        'ship_city' => 'Ship city',
        'ship_zip_code' => 'Ship zip code',
        'terms_and_cond' => 'Terms and Conditions',
        'notes' => 'Notes',
        'owned_by' => 'Assigned To',

        'product_service' => 'Product / Service',
        'unit_cost' => 'Unit Cost',
        'quantity' => 'Quantity',
        'line_total' => 'Line Total',
        'subtotal' => 'Subtotal',
        'discount' => 'Discount',
        'tax' => 'Tax',
        'paid_to_date' => 'Paid to Date',
        'balance_due' => 'Balance Due',
        'tax_id' => 'Tax',
        'currency_id' => 'Currency',
        'delivery_cost' => 'Delivery Cost',

        'account_number' => 'Payment Bank Account',

        'from_company' => 'From Company',
        'from_tax_number' => 'Tax number',
        'from_street' => 'Street',
        'from_country_id' => 'Country',
        'from_state' => 'State',
        'from_city' => 'City',
        'from_zip_code' => 'Zip code',
        'paid' => 'Paid',
        'action' => 'Action',
        'add_row' => 'Add row',
        'gross_value' => 'Gross value',

        'tax_name' => 'Tax',
        'currency_name' => 'Currency',
        'contact_name' => 'Contact',
        'account_name' => 'Account',
        'order_number' => 'Order number',
        'status' => 'Status',

        'is_recurring' => 'Recurring?',
        'send_invoice_to' => 'Send Invoice To',
        'recurring_every' => 'Repeat Every',
        'recurring_period_id' => 'Recurring Period',


    ],

    'table' => [
    ],

    'settings' => [
        'status' => 'Status',
        'vat' => 'Tax values',
        'settings' => "Invoice settings",
        'recurring_period' => 'Recurring Period'
    ],

    'invoices_settings' => [
        'title' => 'Invoices module settings',
        'description' => 'Configure invoice module',
        'panel' => [
            'general_settings' => 'General Settings',
            'recurring_invoice' => 'Recurring invoice setup'
        ],
        'recurring_invoice_email_template' => 'Recurring Invoice Email Template',
        'next_invoice_number' => 'Invoice invoice number',
        'invoice_prefix' => 'Invoice Prefix',
        'enable_increment' => 'Enable Invoice Increment',
        'default_due_days' => 'Default due days'
    ],

    'status' => [
        'module' => 'Status',
        'module_description' => 'Manage status',
        'panel' => [
            'details' => 'Details'
        ],
        'form' => [
            'name' => 'Name',
            'system_name' => 'System name'
        ],
    ],
    'recurring_period' => [
        'module' => 'Recurring period',
        'module_description' => 'Manage recurring period',
        'panel' => [
            'details' => 'Details'
        ],
        'form' => [
            'name' => 'Name',
            'system_name' =>  'System name'
        ],
    ],

    'pdf' => [
        'bill_to' => 'Bill To',
        'ship_to' => 'Ship To',
        'product_service' => 'Product / Service',
        'unit_cost' => 'Unit Cost',
        'quantity' => 'Quantity',
        'line_total' => 'Line Total',
        'subtotal' => 'Subtotal',
        'discount' => 'Discount',
        'delivery_cost' => 'Delivery Cost',
        'tax' => 'Tax',
        'tax_number' => 'Tax Number',
        'gross_value' => 'Gross Value',
        'notes' => 'Notes',
        'terms_and_cond' => 'Terms and Conditions',
        'invoice_number' => 'Invoice',
        'invoice_date' => 'Invoice Date',
        'due_date' => 'Due Date',
        'company' => 'Company'
    ],


];
