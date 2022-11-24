<?php

return [
    'plural' => 'البلاغات',
    'ban' => 'هل انت متأكد انك تريد حظر صاحب الرد',
    'unban' => 'هل انت متأكد انك تريد فك حظر صاحب الرد',
    'ad_reports' => [
        'plural' => 'بلاغات الاعلانات',
        'actions' => [
            'list' => 'قائمه بلاغات الاعلانات',
            'filter' => 'بحث'
        ],
        'messages' => [
            'deleted' => 'تم الحذف بنجاح',
              'bans'  => 'تم تحديث حظر صاحب الرد بنجاح',

        ],
        'attributes' => [
            'ad_id' => 'رقم الاعلان',
            'ad_name' => 'اسم الاعلان',
            'ad_user_name' => 'اسم المعلن',
            'ad_category' => 'فئه الاعلان',
            'ad_reporter_name' => 'اسم صاحب البلاغ',
            'type' => 'نوع البلاغ',
            'note' => 'نبذة',
        ],
        'types' => [
            'ad_sold' => 'اعلان تم بيعة',
            'immoral_ad' => 'اعلان مخل بالاداب',
            'an_ad_at_wrong_section' => 'اعلان فى القسم الخطأ',
            'otherwise' => 'غير ذلك'
        ],
        'empty' => 'فارغ',
        'filter' => 'بحث',
        'ad_id' => 'رقم الاعلان',
        'ad_name' => 'اسم الاعلان',
        'category_name' => 'فئه الاعلان',
        'perPage' => 'فى الصفحه الواحده',
        'dialogs' => [
            'delete' => [
                'title' => 'الحذف',
                'info' => 'هل انت متاكد من الحذف؟',
                'cancel' => 'الغاء',
                'confirm' => 'تاكيد',
            ]
        ]
    ],
    'account_reports' => [
        'plural' => 'بلاغات الحسابات',
        'actions' => [
            'list' => '',
            'filter' => 'تصفيه',
            'block' => 'حظر'
        ],
        'messages' => [
            'blocked' => 'تم الحظر بنجاح'
        ],
        'attributes' => [
            'name' => 'الإسم',
            'code' => 'الكود',
            'key' => 'المفتاح',
            'is_default' => 'افتراضى',
            'fraudulent' => 'محتال',
            'inappropriate_communication' => 'تواصل غيرلائق',
            'inappropriate_ads' => 'نشر اعلانات مخالفة',
            'fake_ads' => 'اعلانات وهمية',
            'offensive_comments' => 'نشر تعليقات مخالفة',
            'otherwise' => 'غيرذلك',
            'block_user' => 'حظر المعلن'
        ],
        'empty' => 'فارغ',
        'filter' => 'تصفيه',
        'ad_id' => 'رقم الاعلان',
        'perPage' => 'فى الصفحه الواحده',
        'dialogs' => [
            'delete' => [
                'title' => 'العنوان',
                'info' => 'معلومات',
                'cancel' => 'الغاء',
                'confirm' => 'تاكيد',

            ]
        ]
    ],
    'comment_reports' => [
        'plural' => 'بلاغات التعليقات',
        'actions' => [
            'list' => '',
            'filter' => 'تصفيه'
        ],
        'attributes' => [
            'name' => 'الإسم',
            'code' => 'الكود',
            'key' => 'المفتاح',
            'is_default' => 'افتراضى',
            'ad_no' => 'رقم الاعلان',
            'ad_name' => 'اسم الاعلان',
            'advertiser_name' => 'اسم صاحب الرد',
            'ad_category' => 'القسم',
            'reporter_name' => 'اسم صاحب البلاغ',
            'comment' => 'الرد المخالف',
            'type' => 'نوع البلاغ',
            'advertiser_ban' => 'حظر صاحب الرد',

        ],
        'empty' => 'فارغ',
        'filter' => 'تصفيه',
        'ad_id' => 'رقم الاعلان',
        'perPage' => 'فى الصفحه الواحده',
        'dialogs' => [
            'delete' => [
                'title' => 'العنوان',
                'info' => 'معلومات',
                'cancel' => 'الغاء',
                'confirm' => 'تاكيد',

            ]
        ]
    ],
    'statistics' => [
        'stores' => [
            'view_all' => 'مشاهده كل المتاجر',
        ],
        'sellers' => [
            'view_all' => 'مشاهده كل البائعين المعتمدين',
        ],
        'certified_stores' => [
            'view_all' => 'مشاهده كل المتاجر المعتمدة',
        ],
        'customers' => [
            'view_all' => 'مشاهده كل العملاء',
        ],
        'ads' => [
            'view_all' => 'مشاهده كل الاعلانات',
            'vip' => 'إعلانات vip',
            'special' => 'إعلانات مميزة',
        ]
    ],
    'types' => [
        \App\Models\CommentReport::PROMOTITIONAL_TYPE => 'رسائل دعائية',
        \App\Models\CommentReport::IMPOLTE_TYPE => 'رد مخل بالأدب',
        \App\Models\CommentReport::OTHER_TYPE => 'غير ذلك',
    ],
];
