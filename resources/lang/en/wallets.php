<?php

return [
    'singular' => 'Wallet',
    'plural' => 'Wallets',
    'empty' => 'There are no wallets yet.',
    'count' => 'Wallets Count.',
    'search' => 'Search',
    'select' => 'Select Wallet',
    'permission' => 'Manage wallets',
    'trashed' => 'wallets Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for wallet',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new wallet',
        'show' => 'Show wallet',
        'edit' => 'Edit wallet',
        'delete' => 'Delete wallet',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The wallet has been created successfully.',
        'updated' => 'The wallet has been updated successfully.',
        'deleted' => 'The wallet has been deleted successfully.',
        'restored' => 'The wallet has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Wallet name',
        'user_id' => 'User',
            "balance" => "Balance",
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the wallet?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the wallet?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the wallet?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
