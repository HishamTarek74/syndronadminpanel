<?php

return [
    'singular' => 'Feature',
    'plural' => 'Features',
    'empty' => 'There are no features yet.',
    'count' => 'Features Count.',
    'search' => 'Search',
    'select' => 'Select Feature',
    'permission' => 'Manage features',
    'trashed' => 'features Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for feature',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new feature',
        'show' => 'Show feature',
        'edit' => 'Edit feature',
        'delete' => 'Delete feature',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The feature has been created successfully.',
        'updated' => 'The feature has been updated successfully.',
        'deleted' => 'The feature has been deleted successfully.',
        'restored' => 'The feature has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Feature name',
        '%name%' => 'Feature name',
        'category_id' => 'Category',
        'options_count' => 'Options Count',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the feature?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the feature?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the feature?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
