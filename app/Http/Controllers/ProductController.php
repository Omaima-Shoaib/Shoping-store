<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products= Product::paginate(15);

      return View('product.index',['products'=>$products]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       $data['image']= $request->file('image')->store('products','images');
            $product=new Product([
                'category'=> $request->category,
                'price'=>$request->price,
                'description'=>$request->description,
                'image'=>$data['image']
                
            ]);
        $product->save();
        return redirect('admin/products');
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
    public function edit($id,Request $request)
    {
        $products= Product::where('id',$request['id'])->get();
        return view('product.edit',['products'=>$products]);
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

        // dd($request);
      if(!isNull($request['image'])){
//  return 'notnull';
       $data['image']= $request->file('image')->store('products','images');
        Product::where('id',$id)->update(['category'=>$request['category'],'price'=>$request['price'],
        'description'=>$request['desctiption'],'image'=>$data['image']]);
        return redirect('admin/products');
        
    }else{
        Product::where('id',$id)->update(['category'=>$request['category'],'price'=>$request['price'],
        'description'=>$request['description']]);
        return redirect('admin/products');
        
    }

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
       Product::find($id)->delete();
       return redirect('admin/products');

    }

    public function getProduct($category){
      $products = Product::where("category", $category)->paginate(15);
      return response()->json($products,200);
    }
}
