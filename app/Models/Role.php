<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\RoleFilter;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Filterable;


    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = RoleFilter::class;

}
