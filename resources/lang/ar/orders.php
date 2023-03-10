<?php

return [
    'plural' => 'عمليات الشراء',
    'singular' => 'عملية الشراء',
    'empty' => 'لا يوجد عمليات الشراء',
    'select' => 'اختر عملية الشراء',
    'active' => 'تمت العمليه',
    'in_active' => 'غير مكتمل',
    'perPage' => 'عدد النتائج في الصفحة',
    'details' => 'تفاصيل عملية الشراء',
    'actions' => [
        'list' => 'كل العمليات الشراء',
        'show' => 'عرض',
        'create' => 'إضافة طلب جديد',
        'new' => 'إضافة',
        'edit' => 'تعديل  عملية الشراء',
        'delete' => 'حذف عملية الشراء',
        'save' => 'حفظ',
        'filter' => 'بحث',
    ],
    'payment_types' => [
        'bank_transfer' => 'تحويل بنكى',
        'wallet' => 'المحفظه',
        'credit' => 'تحويل إلكترونى',
        'cash'=>'نقدا'
    ],
    'order_status' => [
        'request_order' => 'تم عملية الشراء',
        'under_preparation' => 'قيد التجهيز',
        'shipping'=>'قيد التوصيل',
        'delivered' => 'تم التسليم',
        'rejected' => ' تم الرفض من المسئول',
        'user_rejected' => 'تم الرفض من المستخدم'
    ],
    'favorites' => [
        'list' => 'كل المفضله',
        'created_at' => 'تاريخ الاضافه للمفضله',
        'empty' => 'لا يوجد مفضله',
    ],
    'messages' => [
        'created' => 'تم إضافة عملية الشراء بنجاح .',
        'updated' => 'تم تعديل عملية الشراء بنجاح .',
        'deleted' => 'تم حذف عملية الشراء بنجاح .',
        'not_ready' => 'في انتظار موافقه الاداره علي الأوردر',
        'quantity_not_available' => 'الكمية المطلوبه غير متوفرة الآن',
        'return_request'=>'تم إرسال طلب الإرجاع بإنتظار قبول الإدارة.',
        'under_preparation_order'=>'طلبك الأن تحت التحضير رقم :order_id ! ',
        'rejected_order' => 'تم رفض عملية الشراء رقم :order_id ! ',
         'user_rejected'=>'تم رفض إستلام عملية الشراء!',
         'update_status'=>'تم تحديث حالة عملية الشراء',
         'not_found'=>'لا يوجد نتائج!'
    ],
    'attributes' => [
        'id'            => 'رقم عملية الشراء',
        'user_id'       => 'اسم العضو',
        'payment_type'  => 'طريقه الدفع',
        'total_price'   => 'اجمالي المبلغ',
        'created_at'    => 'تاريخ العملية',
        'is_active'     => 'حاله العمليه',
        'status'        => 'حالة العمليه',
        'phone'         => 'الجــوال',
        'order_no'      => 'رقم العملية',
        'desc'          => 'وصف العملية',
        'type'          => 'نوع العملية',
        'day' => 'يوم',
        'month' => 'شهر',
        'six_months' => '6 شهور',
        'year' => 'سنة',
        'from' => 'من',
        'to' => 'إلي',
        'range' => 'من - إلي',
        'user'=>'اسم العضو',

    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا عملية الشراء ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
    ],
];
