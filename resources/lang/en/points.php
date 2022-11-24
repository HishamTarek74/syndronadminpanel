<?php

return [
    'singular' => 'Point',
    'plural' => 'Points',
    'empty' => 'There are no points yet.',
    'count' => 'Points Count.',
    'search' => 'Search',
    'select' => 'Select Point',
    'permission' => 'Manage points',
    'trashed' => 'points Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for point',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new point',
        'show' => 'Show point',
        'edit' => 'Edit point',
        'delete' => 'Delete point',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The point has been created successfully.',
        'updated' => 'The point has been updated successfully.',
        'deleted' => 'The point has been deleted successfully.',
        'restored' => 'The point has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Point name',
        
            "action" => "Action",
            "points" => "Points",
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the point?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the point?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the point?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
