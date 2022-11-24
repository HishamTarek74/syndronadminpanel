<?php

return [
    'singular' => 'قسم المنتح',
    'plural' => 'أقسام المنتجات',
    'empty' => 'لا يوجد خصائص الأقسام حتى الان',
    'count' => 'عدد أقسام المنتجات',
    'search' => 'بحث',
    'select' => 'اختر قسم المنتح',
    'permission' => 'ادارة أقسام المنتجات',
    'trashed' => 'أقسام المنتجات المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن خاصية القسم',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة  قسم المنتج',
        'productCategories'=> 'اقسام المنتجات',
        'show' => 'عرض قسم المنتح',
        'edit' => 'تعديل قسم المنتح',
        'delete' => 'حذف قسم المنتح',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة قسم المنتح بنجاح.',
        'updated' => 'تم تعديل قسم المنتح بنجاح.',
        'deleted' => 'تم حذف قسم المنتح بنجاح.',
        'restored' => 'تم استعادة قسم المنتح بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم قسم المنتح',
        '%name%' => 'اسم قسم المنتح',
        'category_id' => 'القسم',
        'products'=>'عدد المنتجات',
        'options_count' => 'عدد الأوبشنز',
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف قسم المنتح',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا قسم المنتح',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا قسم المنتح نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];