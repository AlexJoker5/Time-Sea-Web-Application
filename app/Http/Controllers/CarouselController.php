<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index(Request $request)
    {
        $category = 'recommend';

        if ($request->has('category')) {
            $category = $request->input('category');
        }
        $watches = Watch::where("category->$category", 1)->get();
        //dd($watches, $category);

        $watch = Watch::all();
        return view('dashboard', compact('watch','watches','category'));
    }

    public function passId($index){
        $watch = Watch::all();
        return view('detailview.detailview', ['index' => $index,'watch' => $watch]);
    }
}
