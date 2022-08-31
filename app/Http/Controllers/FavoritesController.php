<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function get($userId){
        $favorites = Favorites::where('user_id',$userId)->get();

        foreach($favorites as $favorite){
        $product = Product::where('id',$favorite['product_id'])->get();
        echo $product;
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
