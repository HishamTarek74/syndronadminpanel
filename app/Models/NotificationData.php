<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationData extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'cities' => 'array',
    ];

    /**
     * The code of notification users.
     *
     * @var string
     */
    const ALL_TYPE = 'all';

    /**
     * The code of notification users.
     *
     * @var string
     */
    const SELLERS_TYPE = 'sellers';

    /**
     * The code of notification users.
     *
     * @var string
     */
    const STORES_TYPE = 'stores';

    /**
     * The code of notification users.
     *
     * @var string
     */
    const CERTIFIED_STORES_TYPE = 'certified_stores';
}
