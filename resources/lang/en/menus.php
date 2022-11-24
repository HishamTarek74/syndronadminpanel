<?php

return [
    'singular' => 'Menu',
    'plural' => 'Menus',
    'empty' => 'There are no Menus yet.',
    'count' => 'Menus count',
    'search' => 'Search',
    'select' => 'Select Menu',
    'perMenu' => 'Menus Per Menu',
    'filter' => 'Search for Menu',
    'actions' => [
        'list' => 'List all',
        'create' => 'Create Menu',
        'show' => 'Show Menu',
        'edit' => 'Edit Menu',
        'delete' => 'Delete Menu',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Menu has been created successfully.',
        'updated' => 'The Menu has been updated successfully.',
        'deleted' => 'The Menu has been deleted successfully.',
    ],
    'attributes' => [
        'title' => 'Page title',
        '%title%' => 'Page title',
        'link' => 'Link',
        'type' => 'Menu type',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Menu ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
    'types' => [
        \App\Models\Menu::NAVBAR_TYPE => 'Navbar',
        \App\Models\Menu::FOOTER_TYPE => 'Footer',
    ],
];
