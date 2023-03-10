<?php

return [
    'singular' => 'ترقية الحساب',
    'plural' => 'ترقية الحسابات',
    'empty' => 'لا يوجد ترقية الحسابات حتى الان',
    'count' => 'عدد ترقية الحسابات',
    'search' => 'بحث',
    'select' => 'اختر الترقية للحساب',
    'permission' => 'ادارة ترقية الحسابات',
    'trashed' => 'ترقية الحسابات المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن ترقية الحساب',
    'promote' => 'ترقية',
    'demote' => 'إنزال',
    'day' => 'يوم',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة ترقية الحساب',
        'show' => 'عرض الترقية للحساب',
        'edit' => 'تعديل الترقية للحساب',
        'delete' => 'حذف الترقية للحساب',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'user_promotions' => 'ترقية الأعضاء',
        'store_promotions' => 'ترقية المتاجر',
    ],
    'messages' => [
        'created' => 'تم اضافة الترقية للحساب بنجاح.',
        'updated' => 'تم تعديل الترقية للحساب بنجاح.',
        'deleted' => 'تم حذف الترقية للحساب بنجاح.',
        'restored' => 'تم استعادة الترقية للحساب بنجاح.',
        'demoted' => 'تم إنزال الحساب بنجاح',
    ],
    'attributes' => [
        'name' => 'اسم العميل',
        '%name%' => 'اسم العميل',
        'account_status' => 'حالة الحساب',
        'remaining_time' => 'المدة المتبقية',
        "start" => "بداية الترقية",
        "end" => "نهاية الترقية",
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
        'type' => 'نوع الحساب',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الترقية للحساب',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا الترقية للحساب',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا الترقية للحساب نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
