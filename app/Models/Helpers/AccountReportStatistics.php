<?php

namespace App\Models\Helpers;

use App\Models\AccountReport;
use App\Models\User;
use Illuminate\Support\Arr;

trait AccountReportStatistics
{
    public function countReports(User $user=null):object
    {
        $types=AccountReport::REPORT_TYPES;
        foreach ($types as $type){
            $types[$type]=$this->where('user_id', $user->id ?? $this->user->id)
                ->where('type',$type)
                ->get()
                ->count();
        }
        return (object)$types;
    }

}
