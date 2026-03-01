<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\Product;
use App\Models\Season;


class RegisterController extends Controller
{
    public function index()
    {
        $seasons=Season::all();
        return view('register',compact('seasons'));
    }
    public function store(RegisterRequest $request)
    {
        $imagePath=null;
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('products','public');
        }
        $product=Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$imagePath,
            'description'=>$request->description,
            ]);
            if($request->has('seasons')){
               $product->seasons()->attach($request->input('seasons'));
            }
        return redirect()->route('products.index');
    }
}