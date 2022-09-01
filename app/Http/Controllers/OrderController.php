<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('order_products', 'order_products.product_id', '=', 'products.id')->where('order_products.user_id', '=',Auth::id())->paginate(5);;
       $order_products=OrderProduct::where('user_id',Auth::id())->get();
       $count=OrderProduct::where('user_id',Auth::id())->count(); 

      
       
    if($count>0){   
       foreach($order_products as $order_product){
        //  dd($order_products);
       $orders=Order::where('user_id',Auth::id())->get(); 
        return view('orders.index',['products'=>$products,'count'=>$count,'order_product'=>$order_product,'order_products'=>$order_products,'orders'=>$orders]);
       }}
else{
    return view('orders.empty');
}
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
    public function store(Request $request,Product $products)
    {
        // dd($request['products']);   
        $myurl = url()->previous();
    
        if($request['quantity']>0){
            $arr=json_decode($request['products'],true);
         
// dd($arr);
         $order=Order::create(['user_id'=>Auth::id(),'quantity'=>$request['quantity'],'total'=>$request['total'],
        'address'=>$request['address']]);
        $myproducts=$products;
// dd($products);

        foreach($arr as $myarr){
    //    dd($myarr);   
    // dd($arr);  

     $order->orderproducts()->create(['product_id'=>$myarr['product_id'],'user_id'=>Auth::id(),'category'=>$myarr['category']]);
  
        }
    Cart::where('user_id',Auth::id())->delete();
        // dd($x);
        return view('orders.thankyou');
    }else
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
    public function destroy($id)
    {
        //
    }
}
