<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where('id',Auth::id())->first();
        $address=Auth::user()->address;
        
                $carts=Cart::where('user_id',Auth::id())->paginate(5);
        // $products=Product::where('user_id',Auth::id());
        $carttotal=Cart::where('user_id',Auth::id())->sum('total');
        $cartcount=Cart::where('user_id',Auth::id())->count();
    //   dd($carttotal);
       $products=Product::join('carts','carts.product_id','=','products.id')->where('carts.user_id','=',Auth::id())->get();
       return view('cart.index',['products'=>$products,'carts'=>$carts,'carttotal'=>$carttotal,'user'=>$user,'count'=>$cartcount]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $myurl = url()->previous();
    //    dd($request);
    
        $cartitem=new Cart([
            'user_id'=>Auth::id(),
            'product_id'=>$request['id'],
            'price'=>$request['price'],
            'image'=>$request['image'],
            'category'=>$request['category'],
            'description'=>$request['description'],
            'quantity'=>$request['quantity'],
            'total'=>(int)$request['price']*(int)$request['quantity']
        ]);
        $cartitem->save();
// dd((int)$request['price']*(int)$request['quantity']);
return redirect($myurl);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $myurl = url()->previous();
        Cart::where('product_id',$id)->delete();
return redirect($myurl);

    }
}
