<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        .leftside{
            width: 70%;
            margin: auto;
            text-align: center;
        }

        .title{
            float: left;
            font-size: 18px;
            color: #2b4552;
        }
        .value{
            float: right;
            font-size: 18px;
            color: #2b4552;
            margin-right: 10px;
        }
        .component{
            margin-top: 10px;
            background-color: #f4f5f793;
            height: 120px;
            width: 95%;
            border-radius: 25px;
            box-shadow: 5px 0px 15px #3b3c3d33;
            padding-left: 20px;
        }
        .component-title{
            margin-top: 10px;
            background-color: #f4f5f793;
            height:50px;
            width: 95%;
            border-radius: 15px;
            box-shadow: 5px 0px 15px #3b3c3d33;
            padding-left: 20px;
        }.
        imgcontainer{
            float: left;

        }
        .title-product{
            margin-top: 30px;
            margin-left: 40px;
            width: fit-content;
            float: left;
            font-size: 25px;
            color: #112739;
           }.btn-product{
            float: right;
            margin-right: 20px;
            text-decoration: none;
            margin-top: 35px;
            font-size: 16px;
            background-color:#112739;
            color: white; 
            width: 100px;
            text-align: center;
            border-radius: 25px;
            height: 26px;

        }.checkout{
            border: 1px solid #112739;
            text-decoration: none;
         
            font-size: 16px;
            background-color:#112739;
            color: white; 
            width: 200px;
            height: 30px;
            text-align: center;
            border-radius: 25px;
        }
        .checkout:hover{
            border: 1px solid #112739;
            text-decoration: none;
     
            font-size: 16px;
            background-color:#112739;
            color: white; 
            width: 200px;
            height: 30px;
            text-align: center;
            border-radius: 25px;
            box-shadow: 10px 10px 10px #55555542;
        }
        .rmbtn{
            border: none;
            background-color: transparent;
            color: white;

        }
       .empty{
        text-align: center;
        margin-top: 100px;
       }
       .emptyp{
        color: #2b4552
       }
       .add-box-container{
        margin-top: 50px;
        text-align: center;
       }
       #address{
        border-radius: 20px;
        width: 250px;
        border:1px solid #112739;
        padding-left: 5px;
        font-size: 14px
       }
       .title{
        width: 80px;
        text-align: center;
       }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content')


    <div class="leftside">
 <span style="color: #112739;font-size: 25px"> <b>Orders</b> </span>
@if($count>0)
<br>
<br>
<br>
{{-- <div style="background-color: #55555542;width: fit-content;float: left;"> --}}
 <table border="1" style="text-align: center;box-shadow: 10px 10px 10px #55555542">
    <th style="width: 200px">Total</th>
    <th style="width: 200px">address</th>
    <th style="width: 200px">quantity</th>
    <th style="width: 200px">category</th>
    @foreach($orders as $order)
 
{{-- <div style="width: 200px;height: 100px;background-color: #2b455247;border: 1px solid #112739"> --}}
 <tr style="border-top: 1px solid #112739">
 <td > ${{$order['total']}}</td>
 <td> {{$order['address']}} </td>
 <td> {{$order['quantity']}}</td>
    <td>@foreach($order->orderproducts as $shit) 
        <table>
        <tr>
            <td>
            {{ $shit['category']}}
        </td>
        </tr>
        </table>    
        @endforeach
            </td>
@endforeach

{{-- <div style="background-color: #55555542;width: fit-content;float: left;"> --}}
  

</tr>
</table>
{{-- @if($count>0)
    @foreach($products as $product) --}}



   {{-- {{ $product['category'] this line is commented before }} --}}
  

{{--    
   <a style="text-decoration: none;color:white;background-color: #112739" href="{{ route('products.get',$product['product_id']) }}">
<div class="component">
  <div class="imgcontainer"> 
    <table border="0"style='width:900px'>
        <tr>
    <td class="img">  <img src='{{ Storage::disk('images')->url($product->image) }}' width=100px  style='border-radius:20px;margin-top:10px'></div></td>
    <td class="title" style=""> {{ $product['category'] }}</td>
    <td class="title">${{ $product['price'] }}</td>
    <td class="title">  </td> --}}


    {{-- this is block is commented before <td class="title"> 
         <form action="{{ route('product.delete',$product['product_id']) }}" method="post">
        @csrf
        @method('Delete')
    <button class="rmbtn"><div class="btn-product"><span class="material-symbols-outlined" style="font-size: 16px">
        delete
        </span></div></button></td> --}}





        
    {{-- </tr>
    </form>
</table>
</div>
</div></a>

    @endforeach
   --}}
    @else
  <div class="empty">

    <span class="material-symbols-outlined" style="color: #2b4552;font-size: 90px">
        sentiment_dissatisfied
        
        </span>
        <br>
      <p class="emptyp">  Empty</p>

  </div>
    @endif
{{-- </div> --}}

    @endsection

</body>
</html>