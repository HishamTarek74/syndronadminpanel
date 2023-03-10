<?php

return [
    'singular' => 'الخدمة للمتاجر',
    'plural' => 'الخدمات للمتاجر',
    'empty' => 'لا يوجد خدمات المتاجر حتى الان',
    'count' => 'عدد الخدمات للمتاجر',
    'search' => 'بحث',
    'select' => 'اختر الخدمة للمتاجر',
    'permission' => 'ادارة الخدمات للمتاجر',
    'trashed' => 'الخدمات للمتاجر المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن خدمة المتجر',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة خدمة المتجر',
        'show' => 'عرض الخدمة للمتاجر',
        'edit' => 'تعديل الخدمة للمتاجر',
        'delete' => 'حذف الخدمة للمتاجر',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة الخدمة للمتاجر بنجاح.',
        'updated' => 'تم تعديل الخدمة للمتاجر بنجاح.',
        'deleted' => 'تم حذف الخدمة للمتاجر بنجاح.',
        'restored' => 'تم استعادة الخدمة للمتاجر بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم الخدمة للمتاجر',
        '%name%' => 'اسم الخدمة للمتاجر',
        
            "name" => "الاسم",
            "%name%" => "الاسم",
        'image' => 'صورة الخدمة للمتاجر',
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
        'speciality_id' => 'التخصص',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الخدمة للمتاجر',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا الخدمة للمتاجر',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا الخدمة للمتاجر نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
