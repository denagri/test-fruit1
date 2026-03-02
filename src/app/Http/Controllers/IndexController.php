<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('index',compact('products'));
    }
    private function getSearchQuery($request,$query)
    {
        if(!empty($request->keyword)){
            $query->where(function($q)use($request){
                $q->where('name','like','%'.$request->keyword .'%');
            });
        }
        return $query;
    }
    public function search(Request $request)
    {
        $keyword=$request->input('keyword');
        $query = Product::query();
        if(!empty($keyword)) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->sort == 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort == 'low') {
            $query->orderBy('price', 'asc');
        }
        $products=$query->paginate(6);
        return view('index',compact('products','keyword'));
    }
}
