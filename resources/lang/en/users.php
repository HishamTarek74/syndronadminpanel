<?php

return [
    'plural' => 'Accounts',
    'since' => 'Member since :date',
    'profile' => 'Profile',
    'verified' => 'Verified',
    'unverified' => 'Unverified',
    'types' => [
        \App\Models\User::ADMIN_TYPE => 'Admin',
        \App\Models\User::SUPERVISOR_TYPE => 'Supervisor',
        \App\Models\User::CUSTOMER_TYPE => 'Customer',
        \App\Models\User::SELLER_TYPE => 'Seller',
        \App\Models\User::STORE_TYPE => 'Store',
        \App\Models\User::CERTIFIED_STORE_TYPE => 'CertifiedStore',
    ],
    'impersonate' => [
        'go' => 'Go To Dashboard',
        'leave' => 'Back To Previous Account',
    ],
    'all' => 'All Users',
];
