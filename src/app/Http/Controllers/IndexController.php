<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\Product_Season;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('index',compact('products'));
    }
    private function getSearchQuery($request,$query)
    {
        /*リクエストデータに値がはいっているなら*/
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
        /*Contactテーブルで検索する準備を要求*/
        $query = Product::query();
        if(!empty($keyword)) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        // 価格並び替え
        if ($request->sort == '1') {
            $query->orderBy('price', 'desc'); // 高い順
        } elseif ($request->sort == '2') {
            $query->orderBy('price', 'asc');  // 低い順
        }
        /*ユーザーのrequestからGetSearchQueryのqueryを抽出して$queryに入れて*/
        // $query=$this->getSearchQuery($request,$query);
        /*これまでの条件を実行して取得したデータを7件ずつ表示する*/
        $products=$query->paginate(6);
        /*categoriesテーブルの全データを取得し、$categoriesに格納*/
        // $categories=Category::all();
        /*admin.blade.phpに$contacts,$categories,$csvDataの変数を渡して表示*/
        return view('index',compact('products','keyword'));
    }
}
