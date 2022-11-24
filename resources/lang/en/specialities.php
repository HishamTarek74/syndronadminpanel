<?php

return [
    'singular' => 'Speciality',
    'plural' => 'Specialities',
    'empty' => 'There are no specialities yet.',
    'count' => 'Specialities Count.',
    'search' => 'Search',
    'select' => 'Select Speciality',
    'permission' => 'Manage specialities',
    'trashed' => 'specialities Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for speciality',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new speciality',
        'show' => 'Show speciality',
        'edit' => 'Edit speciality',
        'delete' => 'Delete speciality',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The speciality has been created successfully.',
        'updated' => 'The speciality has been updated successfully.',
        'deleted' => 'The speciality has been deleted successfully.',
        'restored' => 'The speciality has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Speciality name',
        '%name%' => 'Speciality name',
        
            "name" => "Name",
            "%name%" => "Name",
        'image' => 'Speciality image',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
        'shop_category_id' => 'Shop category',
        'services_count' => 'Services Count',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the speciality?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the speciality?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the speciality?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
