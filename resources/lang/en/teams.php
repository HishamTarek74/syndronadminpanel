<?php

return [
    'singular' => 'Team',
    'plural' => 'Teams',
    'empty' => 'There are no Teams yet.',
    'count' => 'Teams count',
    'search' => 'Search',
    'select' => 'Select Team',
    'perTeam' => 'Teams Per Team',
    'filter' => 'Search for Team',
    'actions' => [
        'list' => 'List all',
        'create' => 'Create Team',
        'show' => 'Show Team',
        'edit' => 'Edit Team',
        'delete' => 'Delete Team',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Team has been created successfully.',
        'updated' => 'The Team has been updated successfully.',
        'deleted' => 'The Team has been deleted successfully.',
    ],
    'attributes' => [
        'name' => 'Team title',
        '%name%' => 'Team title',
        'role' => 'Role',
        'content' => 'Team content',
        '%content%' => 'Team content',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Team ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
    'roles' => [
        App\Models\Team::CALL_CENTER => 'Call center',
        App\Models\Team::SALES => 'Sales',
        App\Models\Team::CUSTOMER_SERVICE => 'Customer service',
    ],
];
