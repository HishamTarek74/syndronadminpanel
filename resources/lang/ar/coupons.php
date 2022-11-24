<?php

return [
    'singular' => 'الكوبون',
    'plural' => 'الكوبونات',
    'empty' => 'لا يوجد كوبونات حتى الان',
    'count' => 'عدد الكوبونات',
    'search' => 'بحث',
    'select' => 'اختر الكوبون',
    'permission' => 'ادارة الكوبونات',
    'trashed' => 'الكوبونات المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن كوبون',
    'active' => 'نشيط',
    'bending' => 'مُعلق',
    'refused' => 'مرفوض',
    'not_valid' => 'الكوبون منتهى الصلاحية',
    'actions' => [
        'list' => 'عرض الكل',
        'list_site_coupons' => 'كوبونات الموقع',
        'commission_coupons' => 'كوبونات المسوقين',
        'create' => 'اضافة كوبون',
        'show' => 'عرض الكوبون',
        'edit' => 'تعديل الكوبون',
        'delete' => 'حذف الكوبون',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة الكوبون بنجاح.',
        'updated' => 'تم تعديل الكوبون بنجاح.',
        'deleted' => 'تم حذف الكوبون بنجاح.',
        'restored' => 'تم استعادة الكوبون بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم الكوبون',
        "code" => "الكود",
        "due_date" => "مدة فعالية الكوبون",
        "percentage" => "نسبة المئوية",
        "type" => "النوع",
        "max_commision" => "اقصى عمولة",
        "hide_max_sales" => "إخفاء اقصى عمولة",
        "usage_times" => "عدد مرات الاستخدام",
        "status" => "الحالة",
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الكوبون',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا الكوبون',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا الكوبون نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
    'types' => [
        \App\Models\Coupon::COMMISSION_TYPE => 'كوبون المسوقين',
        \App\Models\Coupon::DISCOUNT_TYPE => 'كوبون الخصم',
    ],
];