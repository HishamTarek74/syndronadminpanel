<?php

return [
    'singular' => 'Ad promotion',
    'plural' => 'Ad promotions',
    'empty' => 'There are no ad promotions yet.',
    'count' => 'Ad promotions Count.',
    'search' => 'Search',
    'select' => 'Select Ad promotion',
    'permission' => 'Manage ad promotions',
    'trashed' => 'ad promotions Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for ad promotion',
    'promote' => 'Promote',
    'demote' => 'Demote',
    'day' => 'Day',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new ad promotion',
        'show' => 'Show ad promotion',
        'edit' => 'Edit ad promotion',
        'delete' => 'Delete ad promotion',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The ad promotion has been created successfully.',
        'updated' => 'The ad promotion has been updated successfully.',
        'deleted' => 'The ad promotion has been deleted successfully.',
        'restored' => 'The ad promotion has been restored successfully.',
        'demoted' => 'The ad has been demoted',
    ],
    'attributes' => [
        'name' => 'Ad name',
        '%name%' => 'Ad name',
        'ad_status' => 'Ad status',
        'remaining_time' => 'Remaining time',
        "start" => "Start promotion",
        "end" => "End promotion",
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the ad promotion?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the ad promotion?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the ad promotion?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];