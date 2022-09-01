<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function get($userId){
        $favorites = Favorites::where('user_id',Auth::id())->get();

        foreach($favorites as $favorite){
        // $products = Product::where('id',$favorite['product_id'])->paginate(5);
        $products = Product::where('id',$favorite['product_id'])->get();
        // return View('product.favorites',['products'=>$products]);
// dd($products);
        echo $products;
    }
    }
    public function create(Request $request){
        $favorite = new Favorites([
            "user_id"=>$request->userId,
            "product_id"=>$request->productId,
        ]);
        $favorite->save();
        return 'stored :)';
    }
}
