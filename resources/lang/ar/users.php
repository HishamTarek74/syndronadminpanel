<?php

return [
    'plural' => 'العضويات',
    'since' => 'عضو :date',
    'profile' => 'الملف الشخصي',
    'verified' => 'مفعل',
    'unverified' => 'غير مفعل',
    'team_id'=>'فريق العمل التابع له',
    'types' => [
        \App\Models\User::ADMIN_TYPE => 'مسئول',
        \App\Models\User::SUPERVISOR_TYPE => 'مشرف',
        \App\Models\User::CUSTOMER_TYPE => 'عميل',
        \App\Models\User::SELLER_TYPE => 'بائع',
        \App\Models\User::STORE_TYPE => 'متجر',
        \App\Models\User::CERTIFIED_STORE_TYPE => 'متجر معتمد',
    ],
    'impersonate' => [
        'go' => 'الذهاب للوحة التحكم',
        'leave' => 'العودة للحساب السابق',
    ],
    'all' => 'كل العضويات'
];
