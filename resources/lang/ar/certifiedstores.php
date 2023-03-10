<?php

return [
    'singular' => 'متجر معتمد',
    'plural' => 'المتاجر المعتمدة',
    'empty' => 'لا يوجد المتجر معتمد حتى الان',
    'count' => 'عدد المتجر معتمد',
    'search' => 'بحث',
    'select' => 'اختر متجر معتمد',
    'permission' => 'ادارة المتجر معتمدين',
    'trashed' => 'المتجر معتمدين المحذوفين',
    'perPage' => 'عدد النتائج بالصفحة',
    'filter' => 'ابحث عن متجر معتمد',
    'actions' => [
        'list' => 'عرض الكل',
        'create' => 'اضافة متجر معتمد',
        'show' => 'عرض متجر معتمد',
        'edit' => 'تعديل متجر معتمد',
        'delete' => 'حذف متجر معتمد',
        'options' => 'خيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'messages' => [
        'created' => 'تم اضافة متجر معتمد بنجاح.',
        'updated' => 'تم تعديل متجر معتمد بنجاح.',
        'deleted' => 'تم حذف متجر معتمد بنجاح.',
        'restored' => 'تم استعادة متجر معتمد بنجاح.',
    ],
    'attributes' => [
        'name' => 'اسم العميل',
        'phone' => 'رقم الهاتف',
        'email' => 'البريد الالكترونى',
        'created_at' => 'تاريخ الإنضمام',
        'old_password' => 'كلمة المرور القديمة',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'type' => 'نوع المستخدم',
        'avatar' => 'الصورة الشخصية',
        'id' => 'رقم العضوية',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد حذف متجر معتمد',
            'confirm' => 'حذف',
            'cancel' => 'الغاء',
        ],
        'restore' => [
            'title' => 'تحذير !',
            'info' => 'هل انت متأكد انك تريد استعادة هذا متجر معتمد',
            'confirm' => 'استعادة',
            'cancel' => 'الغاء',
        ],
        'forceDelete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا متجر معتمد نهائياً?',
            'confirm' => 'حذف نهائي',
            'cancel' => 'الغاء',
        ],
    ],
];
