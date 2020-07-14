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

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'website' => 'Website',
            'industry' => 'Industry',
            'timezone' => 'Timezone',
            'fiscal_year' => 'Fiscal year',
            'employees_count' => 'Employees count',
            'project_type' => 'Project type',
            'client_type' => 'Client type',
            'active_projects' => 'Active projects',
            'referenceable' => 'Referenceable',
            'opted_out' => 'Opted out',
            'financial' => 'Financial',
            'hr' => 'Hr',
            'sso' => 'Sso',
            'test_site' => 'Test site',
            'refresh_date' => 'Refresh date',
            'logo' => 'Logo',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'address_lng_lat' => 'Address lng lat',
            'city' => 'City',
            'zip' => 'Zip',
            'country' => 'Country',
            'state' => 'State',
            'lg_account_owner_oversight' => 'Lg account owner oversight',
            'lg_sales_owner' => 'Lg sales owner',
            'employee_group' => 'Employee groups',
            'notes' => 'Notes',

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

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'website' => 'Website',
            'industry' => 'Industry',
            'timezone' => 'Timezone',
            'fiscal_year' => 'Fiscal year',
            'employees_count' => 'Employees count',
            'project_type' => 'Project type',
            'client_type' => 'Client type',
            'active_projects' => 'Active projects',
            'referenceable' => 'Referenceable',
            'opted_out' => 'Opted out',
            'financial' => 'Financial',
            'hr' => 'Hr',
            'sso' => 'Sso',
            'test_site' => 'Test site',
            'refresh_date' => 'Refresh date',
            'logo' => 'Logo',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'address_lng_lat' => 'Address lng lat',
            'city' => 'City',
            'zip' => 'Zip',
            'country' => 'Country',
            'state' => 'State',
            'lg_account_owner_oversight' => 'Lg account owner oversight',
            'lg_sales_owner' => 'Lg sales owner',
            'employee_group' => 'Employee groups',
            'notes' => 'Notes',

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

    'industry' => [
        'title' => 'Industries',

        'actions' => [
            'index' => 'Industries',
            'create' => 'New Industry',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

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

    'timezone' => [
        'title' => 'Timezones',

        'actions' => [
            'index' => 'Timezones',
            'create' => 'New Timezone',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'fiscal-year' => [
        'title' => 'Fiscal Year',

        'actions' => [
            'index' => 'Fiscal Year',
            'create' => 'New Fiscal Year',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'fiscal-year' => [
        'title' => 'Fiscal Year',

        'actions' => [
            'index' => 'Fiscal Year',
            'create' => 'New Fiscal Year',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'begin' => 'Begin',
            'end' => 'End',
            'month_end_close_period' => 'Month end close period',
            'quarterly_close_cycle' => 'Quarterly close cycle',

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

    'financial' => [
        'title' => 'Financial',

        'actions' => [
            'index' => 'Financial',
            'create' => 'New Financial',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

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

        ],
    ],

    'frequency' => [
        'title' => 'Frequency',

        'actions' => [
            'index' => 'Frequency',
            'create' => 'New Frequency',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

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

        ],
    ],

    'payroll' => [
        'title' => 'Payroll',

        'actions' => [
            'index' => 'Payroll',
            'create' => 'New Payroll',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

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

        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

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

        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

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

        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'website' => 'Website',
            'industry_id' => 'Industry',
            'timezone_id' => 'Timezone',
            'fiscal_year_id' => 'Fiscal year',
            'employees_count' => 'Employees count',
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

    // Do not delete me :) I'm used for auto-generation
];
