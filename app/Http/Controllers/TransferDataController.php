<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Category;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

class TransferDataController extends Controller
{
    public function categories()
    {


        $selections = DB::connection('mysql')->select('select * from selection_options');
        


        $features = Option::all();

        // delete categories
        foreach($features as $feature) {
            $feature->delete();
        }

        // transfer old selections features to new ones
        foreach($selections as $selection) {

            $c = Option::create([
                'name:ar' => $selection->name,
                'name:en' => $selection->name_en,
                'feature_id' =>113,
            ]);

//            if($selection->photo) {
//                $c->addMedia('uploads/' . $selection->photo)
//                ->usingName('image')
//                ->toMediaCollection();
//                $c->addAllMediaFromTokens();
//            }
        }

        dd("done");
    }
}
