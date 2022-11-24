<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AgeGroupCollection extends ResourceCollection
{
    public $collects = AgeGroupResourse::class;
}
