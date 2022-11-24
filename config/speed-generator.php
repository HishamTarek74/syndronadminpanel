<?php

/**
 * Speed generator
 *
 * To help generate new cruds
 */
return [

    /**
     * Supported database fields
     *
     * 'string', 'text', 'longText', 'tinyText', 'integer', 'tinyInteger',
     * 'float', 'bigInteger', 'decimal', 'double', 'date',
     * 'time', 'boolean', 'timestamp', 'timestamps'
     */
    'shop_service' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['الخدمة للمتاجر', 'الخدمات للمتاجر', 'خدمة المتجر', 'خدمات المتاجر'],
        /**
         * Database fields
         */
        'database_fields' => [
            
        ],

        /**
         * Make active equal to true if you want to add translation fields
         * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'الاسم',
                        'en' => 'Name',
                    ],
                    'options' => [
                        
                    ],
                ],
            ],
        ],
    ],
];
