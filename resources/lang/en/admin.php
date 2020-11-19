<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'client-type' => [
        'title' => 'Client Type',

        'actions' => [
            'index' => 'Client Type',
            'create' => 'New Client Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'project-scope' => [
        'title' => 'Project Scope',

        'actions' => [
            'index' => 'Project Scope',
            'create' => 'New Project Scope',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'financial' => [
        'title' => 'Financial',

        'actions' => [
            'index' => 'Financial',
            'create' => 'New Financial',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'platform' => 'Platform',

        ],
    ],

    'hr' => [
        'title' => 'Hr',

        'actions' => [
            'index' => 'Hr',
            'create' => 'New Hr',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'system' => 'System',
        ],
    ],

    'employee-group' => [
        'title' => 'Employee Groups',

        'actions' => [
            'index' => 'Employee Groups',
            'create' => 'New Employee Group',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'note' => [
        'title' => 'Notes',

        'actions' => [
            'index' => 'Notes',
            'create' => 'New Note',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'company_culture' => 'Company culture',
            'strategic_goals' => 'Strategic goals',
            'compliance' => 'Compliance',

        ],
    ],

    'liability' => [
        'title' => 'Liability',

        'actions' => [
            'index' => 'Liability',
            'create' => 'New Liability',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'card-program' => [
        'title' => 'Card Programs',

        'actions' => [
            'index' => 'Card Programs',
            'create' => 'New Card Program',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'website' => 'Website',
            'industry_id' => 'Industry',
            'timezone_id' => 'Timezone',
            'fiscal_year_begin' => 'Fiscal year begin',
            'fiscal_year_end' => 'Fiscal year end',
            'fiscal_year_month_end_close_period' => 'Fiscal year month end close period',
            'fiscal_year_quarterly_close_cycle' => 'Fiscal year quarterly close cycle',
            'employees_count' => 'Employees count',
            'project_scope_id' => 'Project scope',
            'project_type_id' => 'Project type',
            'client_type_id' => 'Client type',
            'active_projects' => 'Active projects',
            'referenceable' => 'Referenceable',
            'opted_out' => 'Opted out',
            'financial_id' => 'Financial',
            'hr_id' => 'Hr',
            'sso' => 'Sso',
            'test_site' => 'Test site',
            'refresh_date' => 'Refresh date',
            'logo' => 'Logo',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'address_lng_lat' => 'Address lng lat',
            'city' => 'City',
            'zip' => 'Zip',
            'country_id' => 'Country',
            'state_id' => 'State',
            'lg_account_owner_oversight' => 'Lg account owner oversight',
            'lg_sales_owner' => 'Lg sales owner',
            'employee_group_id' => 'Employee groups',
            'notes_id' => 'Notes',
            'tmc_id' => 'TMC',
            'platform_id' => 'Platform',
            'concur_product_id' => 'Concur Products',

        ],
    ],

    'industry' => [
        'title' => 'Industries',

        'actions' => [
            'index' => 'Industries',
            'create' => 'New Industry',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'concur-product' => [
        'title' => 'Concur Products',

        'actions' => [
            'index' => 'Concur Products',
            'create' => 'New Concur Product',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'product' => 'Product',
            'segment' => 'Segment',

        ],
    ],

    'timezone' => [
        'title' => 'Timezones',

        'actions' => [
            'index' => 'Timezones',
            'create' => 'New Timezone',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'project-type' => [
        'title' => 'Project Type',

        'actions' => [
            'index' => 'Project Type',
            'create' => 'New Project Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'country' => [
        'title' => 'Countries',

        'actions' => [
            'index' => 'Countries',
            'create' => 'New Country',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'two_char_country_code' => 'Two char country code',
            'three_char_country_code' => 'Three char country code',

        ],
    ],

    'state' => [
        'title' => 'State',

        'actions' => [
            'index' => 'State',
            'create' => 'New State',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'abbreviation' => 'Abbreviation',
            'name' => 'Name',
            'country_id' => 'Country',

        ],
    ],

    'credit-card' => [
        'title' => 'Credit Cards',

        'actions' => [
            'index' => 'Credit Card',
            'create' => 'New Credit Card',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bank_name' => 'Bank name',
            'payment_type' => 'Payment type',
            'statement_cycle' => 'Statement cycle',
            'liability_id' => 'Liability',
            'cc_feed' => 'Credit card feed',
            'payment_method_id' => 'Payment method',
            'batch_config' => 'Batch configuration',
            'rebate' => 'Rebate',
            'customer_id' => 'Customer',
            'country' => 'Countries deployed',
            'card_program_id' => 'Card program',
        ],
    ],

    'global-footprint' => [
        'title' => 'Global Footprint',

        'actions' => [
            'index' => 'Global Footprint',
            'create' => 'New Global Footprint',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'reimbursement_id' => 'Reimbursement',
            'concur_product' => 'Concur product',
            'country' => 'Countries deployed',
        ],
    ],

    'stakeholder' => [
        'title' => 'Stakeholders',

        'actions' => [
            'index' => 'stakeholder',
            'create' => 'New stakeholder',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'role' => 'Role',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'contact_method_id' => 'Contact method',
            'timezone_id' => 'Timezone',
            'customer_id' => 'Customer',

        ],
    ],

    'segment' => [
        'title' => 'Segments',

        'actions' => [
            'index' => 'Segment',
            'create' => 'New Segment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'tmc' => [
        'title' => 'TMCS',

        'actions' => [
            'index' => 'TMC',
            'create' => 'New TMC',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'comment' => 'Comment',

        ],
    ],

    'customer-tmc' => [
        'title' => 'Customer TMC',

        'actions' => [
            'index' => 'Customer TMC (pivot table)',
            'create' => 'New Customer TMC',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'tmc_id' => 'TMC',
            'customer_id' => 'Customer',

        ],
    ],

    'payment-method' => [
        'title' => 'Payment methods',

        'actions' => [
            'index' => 'Payment method',
            'create' => 'New Payment method',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',

        ],
    ],

    'concur-product-customer' => [
        'title' => 'Concur product customer',

        'actions' => [
            'index' => 'Concur product customer (pivot table)',
            'create' => 'New Concur product customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'customer_id' => 'Customer',
            'concur_product_id' => 'Concur product',
        ],
    ],

    'concur-product-global-footprint' => [
        'title' => 'Concur Product Global footprint',

        'actions' => [
            'index' => 'Concur product Global footprint (pivot table)',
            'create' => 'New Concur product Global footprint',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'global_footprint_id' => 'Global footprint',
            'concur_product_id' => 'Concur product',
        ],
    ],

    'country-global-footprint' => [
        'title' => 'Global footprint country',

        'actions' => [
            'index' => 'Global footprint country (pivot table)',
            'create' => 'New Global footprint country',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'global_footprint_id' => 'Global footprint',
            'country_id' => 'Country',
        ],
    ],

    'country-credit-card' => [
        'title' => 'Country credit card',

        'actions' => [
            'index' => 'Country credit card (pivot table)',
            'create' => 'New Country credit card',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'credit_card_id' => 'Credit card',
            'country_id' => 'Country',
        ],
    ],

    'contact-method' => [
        'title' => 'Contact method',

        'actions' => [
            'index' => 'Contact method',
            'create' => 'New Contact method',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
        ],
    ],

    'reimbursement' => [
        'title' => 'Reimbursement',

        'actions' => [
            'index' => 'Reimbursement',
            'create' => 'New Reimbursement',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'type' => 'Type',
        ],
    ],

    'dashboard' => [
        'title' => 'Dashboard',
    ],

    // Do not delete me :) I'm used for auto-generation
];
