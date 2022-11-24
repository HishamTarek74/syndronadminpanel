<?php

return [
    'singular' => 'تذكرة الدعم الفنى',
    'plural' => 'تذاكر الدعم الفنى',
    'empty' => 'لا يوجد تذاكر حتى الان',
    'count' => 'عدد تذاكر الدعم الفنى',
    'search' => 'بحث',
    'select' => 'اختر تذكرة الدعم الفنى',
    'permission' => 'ادارة تذاكر الدعم الفنى',
    'trashed' => 'تذاكر الدعم الفنى المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن تذاكر ',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة تذاكر ',
        'show' => 'عرض تذكرة الدعم الفنى',
        'edit' => 'تعديل تذكرة الدعم الفنى',
        'delete' => 'حذف تذكرة الدعم الفنى',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة تذكرة الدعم الفنى بنجاح.',
        'updated' => 'تم تعديل تذكرة الدعم الفنى بنجاح.',
        'deleted' => 'تم حذف تذكرة الدعم الفنى بنجاح.',
        'restored' => 'تم استعادة تذكرة الدعم الفنى بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم تذكرة الدعم الفنى',
         "customer" => "اسم العميل",
         "employee" => "اسم الموظف",
         "description" => "وصف التذكرة",
        "user_type"=>'نوع الحساب ',
        'ticket_type'=> 'نوع التذكرة',
         "image" => "الصوره",
         "status" => "حالة التذكرة",
        'created_at' => 'اضافة في',
        'deleted_at' => 'حذف في',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف تذكرة الدعم الفنى',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا تذكرة الدعم الفنى',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا تذكرة الدعم الفنى نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
    "user_types"=>[
        \App\Models\User::CUSTOMER_TYPE => 'عميل عادي',
        \App\Models\User::STORE_TYPE => 'متجر',
        \App\Models\User::CERTIFIED_STORE_TYPE => 'متجر معتمد',
        \App\Models\User::SELLER_TYPE => 'بائع',
    ],
];