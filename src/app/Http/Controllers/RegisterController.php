<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\Product;
use App\Models\Season;


class RegisterController extends Controller
{
    // 一覧を表示する必要をあまり感じていないためindexは後々消していいかも
    public function index()
    {
        $seasons=Season::all();
        return view('register',compact('seasons'));
    }
    public function show($id)
    {
        $seasons =Season::find($id);
        return view('register',compact('seasons'));
    }
    public function confirm(RegisterRequest $request)
    {
        $products= $request->all();
        $season= Product::find($request->category_id);
        return view('register',compact('products','season'));
    }
    public function store(RegisterRequest $request)
    {
        if ($request->has('back')) {
            return redirect('index');
        }
        Product::create(
            $request->only([
                'name',
                'price',
                'image',
                'description'
            ])
        );
        return view('index');
    }
}
