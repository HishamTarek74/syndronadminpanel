<?php

namespace App\Models\Relations;

use App\Models\Offer;
use App\Models\PaymentCard;

trait UserRelations
{
    /**
     * Get offers.
     * @return void
     */
    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    /**
     * Get payment cards
     *
     * @return void
     */
    public function paymentCards()
    {
        return $this->hasMany(PaymentCard::class);
    }
}
