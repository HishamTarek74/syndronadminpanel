<?php

return [
    'singular' => 'Policy',
    'plural' => 'Policies',
    'empty' => 'There are no policies yet.',
    'count' => 'Policies Count.',
    'search' => 'Search',
    'select' => 'Select Policy',
    'permission' => 'Manage policies',
    'trashed' => 'policies Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for policy',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new policy',
        'show' => 'Show policy',
        'edit' => 'Edit policy',
        'delete' => 'Delete policy',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The policy has been created successfully.',
        'updated' => 'The policy has been updated successfully.',
        'deleted' => 'The policy has been deleted successfully.',
        'restored' => 'The policy has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Policy name',
        '%name%' => 'Policy name',
        
            "name" => "Name",
            "%name%" => "Name",
        'shop_category_id' => 'Shop category',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the policy?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the policy?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the policy?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
