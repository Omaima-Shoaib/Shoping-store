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
          float: left;
          padding-left: 10px;
        }
        .rightside{
            width: 25%;
            float: left;
            background-color: #f4f5f7;
            border-radius: 25px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 20px;
            height: 320px;
            box-shadow: 10px 0px 15px #3b3c3d33;

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
        }.imgcontainer{
            float: left;

        }
        .title-cart{
            margin-top: 30px;
            margin-left: 40px;
            width: fit-content;
            float: left;
            font-size: 25px;
            color: #112739;
           }.btn-cart{
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
<div class="component-title">

</div>
@if($count>0)
    @foreach($carts as $cart)
   {{-- {{ $cart['category'] }} --}}
  

<div class="component">
  <div class="imgcontainer"> 
    <table border="1"style='width:800px'>
        <tr>
    <td class="img">  <img src='{{ Storage::disk('images')->url($cart->image) }}' width=100px height=100px   style='border-radius:20px;margin-top:10px'></div></td>
    <td class="title" style=""> {{ $cart['category'] }}</td>
    <td class="title"> {{ $cart['quantity'] }}</td>
    <td class="title">${{ $cart['price'] }}</td>
    <td class="title">    ${{ $cart['total'] }}</td>
    <td class="title"> <a style="text-decoration: none;color:white" href="{{ route('products.get',$cart['product_id']) }}"> <div class="btn-cart">view</div></a></td>
    <td class="title">  <form action="{{ route('cart.delete',$cart['product_id']) }}" method="post">
        @csrf
        @method('Delete')
    <button class="rmbtn"><div class="btn-cart"><span class="material-symbols-outlined" style="font-size: 16px">
        delete
        </span></div></button></td>
    </tr>
    </form>
</table>
</div>
</div>

    @endforeach
    @else
  <div class="empty">

    <span class="material-symbols-outlined" style="color: #2b4552;font-size: 90px">
        sentiment_dissatisfied
        
        </span>
        <br>
      <p class="emptyp">  Empty Cart</p>

  </div>
    @endif
</div>
<div class="rightside">
  <div class="title">Items:</div>
  <div class="value">{{$count }}</div>
<br>
<br>
  <div class="title">Total:</div>
  <div class="value">${{$carttotal}}</div>
<br>
<br>
  <div class="title">Total after discount:</div>
  <div class="value">
    @if($user->membership=='Gold')
    ${{number_format((float)$carttotal-($carttotal*(15/100)), 2, '.', '');}}
    @elseif($user->membership=='Platinum')
    ${{number_format((float)$carttotal-($carttotal*(10/100)), 2, '.', '');}}
    @else
    No discount
    @endif

  </div>
  <br>
  <div class="add-box-container">
    <form action="">
        <input type="text" name="address" id="address" required placeholder="Delivery address">
    </form>
</div>

<div class="add-box-container">
    <form action="">
        <button class="checkout">Proceed to checkout</button>
    </form>
</div>


  
   
</div>
{{ $carts->links() }}

    @endsection

</body>
</html>