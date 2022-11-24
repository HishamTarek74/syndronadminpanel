<?php

return [
    'plural' => 'التيمات',
    'singular' => 'فريق عمل',
    'empty' => 'لا توجد تيمات',
    'select' => 'اختر فريق عمل',
    'select-type' => 'الكل',
    'perPage' => 'عدد النتائج في فريق عمل',
    'filter' => 'ابحث عن فريق عمل',
    'actions' => [
        'list' => 'عرض الكل ',
        'show' => 'عرض',
        'create' => 'إضافة فريق عمل جديدة',
        'edit' => 'تعديل  فريق عمل',
        'delete' => 'حذف فريق عمل',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم إضافة فريق عمل بنجاح .',
        'updated' => 'تم تعديل فريق عمل بنجاح .',
        'deleted' => 'تم حذف فريق عمل بنجاح .',
    ],
    'attributes' => [
        'name' => 'اسم فريق عمل',
        'title' => 'اسم فريق عمل',
        'role' => 'دور الفريق',
        '%name%' => 'اسم فريق عمل',
        'content' => 'محتوي فريق عمل',
        '%content%' => 'محتوي فريق عمل',
    ],
    'default' => [
        'name' => 'اسم فريق عمل',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذه فريق عمل ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
    ],
    'roles' => [
        App\Models\Team::CALL_CENTER => 'الدعم الفنى',
        App\Models\Team::SALES => 'المبيعات',
        App\Models\Team::CUSTOMER_SERVICE => 'خدمة العملاء',
    ],

];
