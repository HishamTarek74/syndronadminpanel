<?php 

namespace App\Models\Helpers;

use App\Models\User;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

trait HasReputation 
{
    /**
     * Award user points based on his action
     *
     * @param App\User $user
     * @param integer $eventId
     * @return void
     */
    public static function award($user, $eventId)
    {
        $record = Point::find($eventId);

        $user->increment('points', $record->points);
    }

    /**
     * Reduce user points based on his action
     *
     * @param App\User $user
     * @param integer $eventId
     * @return void
     */
    public static function reduce($user, $eventId)
    {
        $record = Point::find($eventId);

        $user->decrement('points', $record->points);
    }

    /**
     * Get top user points
     *
     * @param integer $id
     * @return void
     */
    public static function top($id = 10)
    {
        return User::get()->sortByDesc(function($user){
            return $user->point;
        })->take($id);
    }
}
