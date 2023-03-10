<?php

return [
    'singular' => 'الخاصية',
    'plural' => 'الخصائص',
    'empty' => 'لا يوجد خصائص الأقسام حتى الان',
    'count' => 'عدد الخصائص',
    'search' => 'بحث',
    'select' => 'اختر الخاصية',
    'permission' => 'ادارة الخصائص',
    'trashed' => 'الخصائص المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن خاصية القسم',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة خاصية القسم',
        'show' => 'عرض الخاصية',
        'edit' => 'تعديل الخاصية',
        'delete' => 'حذف الخاصية',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة الخاصية بنجاح.',
        'updated' => 'تم تعديل الخاصية بنجاح.',
        'deleted' => 'تم حذف الخاصية بنجاح.',
        'restored' => 'تم استعادة الخاصية بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم الخاصية',
        '%name%' => 'اسم الخاصية',
        'category_id' => 'القسم',
        'selection_type' => 'نوع الاختيار في التطبيق',
        'options_count' => 'عدد الأوبشنز',
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف الخاصية',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا الخاصية',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا الخاصية نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
