<?php

return [
    'plural' => 'المديرين',
    'singular' => 'المدير',
    'empty' => 'لا يوجد مديرين',
    'select' => 'اختر المدير',
    'permission' => 'ادارة المديرين',
    'trashed' => 'المديرين المحذوفين',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'list' => 'كل المديرين',
        'show' => 'عرض',
        'create' => 'إضافة',
        'new' => 'إضافة',
        'edit' => 'تعديل  المدير',
        'delete' => 'حذف المدير',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم إضافة المدير بنجاح .',
        'updated' => 'تم تعديل المدير بنجاح .',
        'deleted' => 'تم حذف المدير بنجاح .',
        'restored' => 'تم استعادة المدير بنجاح .',
    ],
    'attributes' => [
        'name' => 'اسم المدير',
        'phone' => 'رقم الهاتف',
        'email' => 'البريد الالكترونى',
        'created_at' => 'تاريخ الإنضمام',
        'old_password' => 'كلمة المرور القديمة',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'type' => 'نوع المستخدم',
        'avatar' => 'الصورة الشخصية',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا المدير ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد استعادة هذا المدير ?',
            'confirm' => 'استعادة',
            'cancel' => 'إلغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا المدير نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'إلغاء',
        ],
    ],
];
