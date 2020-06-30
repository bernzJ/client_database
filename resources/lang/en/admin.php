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
            'employee_groups' => 'Employee groups',
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
            'employee_groups' => 'Employee groups',
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

    // Do not delete me :) I'm used for auto-generation
];