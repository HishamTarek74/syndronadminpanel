<?php

return [
    'plural' => 'Managers',
    'singular' => 'Manager',
    'empty' => 'There are no Managers',
    'select' => 'Select Manager',
    'permission' => 'Manage Managers',
    'trashed' => 'Trashed Managers',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List Managers',
        'show' => 'Show Manager',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Manager',
        'delete' => 'Delete Manager',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Manager has been created successfully.',
        'updated' => 'The Manager has been updated successfully.',
        'deleted' => 'The Manager has been deleted successfully.',
        'restored' => 'The Manager has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Name',
        'phone' => 'Phone',
        'email' => 'Email',
        'created_at' => 'The Date Of Join',
        'old_password' => 'Old Password',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'type' => 'User Type',
        'avatar' => 'Avatar',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Manager ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the Manager ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the Manager ?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
