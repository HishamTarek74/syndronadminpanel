<?php

namespace App\Http\Controllers\Api;

use App\Models\Promotion;
use App\Http\Filters\PromotionFilter;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\Countries\AreaSelectResource;
use App\Models\Area;
use App\Models\City;
use App\Models\Page;
use App\Models\Palace;
use App\Models\Country;
use Illuminate\Routing\Controller;
use App\Http\Resources\PageSelectResource;
use App\Http\Filters\Countries\SelectFilter;
use App\Http\Resources\Countries\CitySelectResource;
use App\Http\Resources\Countries\CountrySelectResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function countries(SelectFilter $filter)
    {
        $countries = Country::active()->filter($filter)->paginate();

        return CountrySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cities(SelectFilter $filter)
    {
        $countries = City::filter($filter)->paginate();

        return CitySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function areas(SelectFilter $filter)
    {
        $countries = Area::filter($filter)->paginate();

        return AreaSelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function pages(SelectFilter $filter)
    {
        $pages = Page::filter($filter)->paginate();

        return PageSelectResource::collection($pages);
    }
    public function promotions()
    {
        $promotions = Promotion::filter()->paginate();

        return PromotionResource::collection($promotions);
    }
}
