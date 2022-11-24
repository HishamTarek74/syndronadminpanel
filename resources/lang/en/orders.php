<?php

return [
    'singular' => 'Order',
    'plural' => 'Orders',
    'empty' => 'There are no Orders yet.',
    'count' => 'Orders count',
    'search' => 'Search',
    'select' => 'Select Order',
    'perOrder' => 'Orders Per Page',
    'filter' => 'Search for Order',
    'active' => 'Done',
    'in_active' => 'Waiting',
    'details' => 'Order Details',
    'actions' => [
        'list' => 'List all',
        'create' => 'Create Order',
        'show' => 'Show Order',
        'edit' => 'Edit Order',
        'delete' => 'Delete Order',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'payment_types' => [
        'bank_transfer' => 'Bank transfer',
        'wallet' => 'Wallet',
        'credit' => 'Credit',
    ],
    'order_status' => [
        'request_order' => 'request order',
        'under_preparation' => 'under preparation',
        'delivered' => 'delivered',
        'rejected' => 'rejected',
        'user_rejected' => ' تم الرفض من المستخدم'

    ],
    'messages' => [
        'created' => 'The Order has been created successfully.',
        'updated' => 'The Order has been updated successfully.',
        'deleted' => 'The Order has been deleted successfully.',
        'not_ready' => 'Waiting for administration acceptance',
        'quantity_not_available' => 'Quantity not available right now',
        'user_rejected'=>'The Order has been rejected!'
    ],
    'attributes' => [
        'id' => 'Order ID',
        'user_id' => 'Order owner',
        'payment_type' => 'Payment type',
        'total_price' => 'Total price',
        'created_at' => 'Created at',
        'is_active' => 'Status',
        'coupon_id' => 'Coupon'
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Order ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
