<?php

return [
    'sellers' => 'Sellers',
    'stores' => 'Stores',
    'certified_stores' => 'Certified stores',
    'customers' => 'Customers',
    'statistics' => [
        'stores' => [
            'view_all' => 'View all stores',

        ],
        'sellers' => [
            'view_all' => 'View all sellers',
        ],
        'certified_stores' => [
            'view_all' => 'View all Certified stores',
        ],
        'customers' => [
            'view_all' => 'View all Customers',
        ],
    ],

    'plural' => 'Reports',
    'ad_reports' => [
        'plural' => 'Ads Reports',
        'actions' => [
            'list' => 'List Of Ads Reports',
            'filter' => 'filter'
        ],
        'messages' => [
            'deleted' => 'Deleted Successfully'
        ],
        'attributes' => [
            'ad_id' => 'Ad Number',
            'ad_name' => 'Ad Name',
            'ad_user_name' => 'Ad User Name',
            'ad_category' => 'Ad Category',
            'ad_reporter_name' => 'Ad Owner Name',
            'type' => 'Report Type',
            'note' => 'Note',
        ],
        'types' => [
            'ad_sold' => 'ad sold',
            'immoral_ad' => 'immoral ad',
            'an_ad_at_wrong_section' => 'an ad at wrong section',
            'otherwise' => 'otherwise'
        ],
        'empty' => 'Empty',
        'filter' => 'Filter',
        'ad_id' => 'Ad Number',
        'ad_name' => 'Ad Name',
        'category_name' => 'Ad Category',
        'perPage' => 'Per Page',
        'dialogs' => [
            'delete' => [
                'title' => 'Delete',
                'info' => 'Are You Sure?',
                'cancel' => 'Cancel',
                'confirm' => 'Confirm',
            ]
        ]
    ],
    'account_reports' => [
        'plural' => 'Account Report',
        'actions' => [
            'list' => '',
            'filter' => 'filter'
        ],
        'attributes' => [
            'fraudulent' => 'fraudulent',
            'inappropriate_communication' => 'inappropriate_communication',
            'inappropriate_ads' => 'inappropriate_ads',
            'fake_ads' => 'fake_ads',
            'offensive_comments' => 'offensive_comments',
            'otherwise' => 'otherwise',
            'block_user'=>'block user'
        ],
        'empty' => 'Empty',
        'filter' => 'Filter',
        'ad_id' => 'Ad Number',
        'ad_name' => 'Ad Name',
        'category_name' => 'Ad Category',
        'perPage' => 'Per Page',
        'dialogs' => [
            'delete' => [
                'title' => 'Delete',
                'info' => 'Are You Sure?',
                'cancel' => 'Cancel',
                'confirm' => 'Confirm',
            ]
        ]
    ],
    'comment_reports' => [
        'plural' => 'Comments Reports',
        'actions' => [
            'list' => '',
            'filter' => 'filter'
        ],
        'attributes' => [

        ],
        'empty' => 'Empty',
        'filter' => 'Filter',
        'ad_id' => 'Ad Number',
        'ad_name' => 'Ad Name',
        'category_name' => 'Ad Category',
        'perPage' => 'Per Page',
        'dialogs' => [
            'delete' => [
                'title' => 'Delete',
                'info' => 'Are You Sure?',
                'cancel' => 'Cancel',
                'confirm' => 'Confirm',
            ]
        ]
    ],
    'types' => [
        \App\Models\CommentReport::PROMOTITIONAL_TYPE => 'Promotional',
        \App\Models\CommentReport::IMPOLTE_TYPE => 'Impolite',
        \App\Models\CommentReport::OTHER_TYPE => 'Others',
    ],
];
