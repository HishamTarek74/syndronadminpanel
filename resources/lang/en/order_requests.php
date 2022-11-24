<?php

return [
    'singular' => 'Order request',
    'plural' => 'Order requests',
    'empty' => 'There are no order requests yet.',
    'count' => 'Order requests Count.',
    'search' => 'Search',
    'select' => 'Select Order request',
    'permission' => 'Manage order requests',
    'trashed' => 'order requests Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for order request',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new order request',
        'show' => 'Show order request',
        'edit' => 'Edit order request',
        'delete' => 'Delete order request',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The order request has been created successfully.',
        'updated' => 'The order request has been updated successfully.',
        'deleted' => 'The order request has been deleted successfully.',
        'restored' => 'The order request has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Order request name',
        
            "status" => "Status",
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the order request?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the order request?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the order request?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
    'status' => [
        \App\Models\OrderRequest::BENDING => 'Bending',
        \App\Models\OrderRequest::ACCEPTED => 'Accepted',
        \App\Models\OrderRequest::REFUSED => 'Refused',
    ],
];
