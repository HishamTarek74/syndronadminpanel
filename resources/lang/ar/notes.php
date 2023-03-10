<?php

return [
    'singular' => 'المفكرة',
    'plural' => 'مفكرة',
    'empty' => 'لا يوجد كوبونات حتى الان',
    'count' => 'عدد مفكرة',
    'search' => 'بحث',
    'select' => 'اختر المفكرة',
    'permission' => 'ادارة مفكرة',
    'trashed' => 'مفكرة المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن كوبون',
    'close' => 'غلق',
    'actions' => [
        'list' => 'عرض الكل',
        'list_site_coupons' => 'كوبونات الموقع',
        'commission_coupons' => 'كوبونات المسوقين',
        'create' => 'اضافة كوبون',
        'show' => 'عرض المفكرة',
        'edit' => 'تعديل المفكرة',
        'delete' => 'حذف المفكرة',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة المفكرة بنجاح.',
        'updated' => 'تم تعديل المفكرة بنجاح.',
        'deleted' => 'تم حذف المفكرة بنجاح.',
        'restored' => 'تم استعادة المفكرة بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم المفكرة',
        'title' => 'العنوان',
        'start' => 'تاريخ البداية',
        'end' => 'تاريخ النهاية',
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف المفكرة',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا المفكرة',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا المفكرة نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
