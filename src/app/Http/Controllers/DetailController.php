<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\DetailRequest;
use App\Models\Product;
use App\Models\Season;

class DetailController extends Controller
{
    public function show($id)
    {
        $product =Product::with('seasons')->findOrFail($id);
        $seasons =Season::all();
        return view('detail',compact('product','seasons'));
    }
    public function update(DetailRequest $request,$id)
    {
        $product=Product::findOrFail($id);
        $imagePath=$product->image;
        if($request->hasFIle('image')){
            $imagePath=$request->file('image')->store('products','public');
        }
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$imagePath,
        ]);
        $product->seasons()->sync($request->season_ids);
        return redirect()->route('products.index');
    }
}
