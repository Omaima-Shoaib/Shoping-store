<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .mycon{
            width: 70%;
            background-color: #f4f5f7;
            margin: auto;
            border-radius: 20px;
            padding: 10px;
            margin-top: 10px;
   
        }
        .cption{
      color: #2b4552;
      display: inline-flex;
      float: left;
            width: 20%;
    }
        .desc{
            color: #2b4552;
      display: inline-flex;
      float: left;
            width: 30%;
        }
        .price{
            color: #2b4552;
      display: inline-flex;
      float: left;
            width: 20%;
        }
        .imge{

        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="mycon">

    <div class="cption">Category</div>
    <div class="desc">Description</div>
    <div class="price"> Price</div>
    <div class="imge"> --</div>
    </div>
    @foreach ($products as $product)
 <div class="mycon">
<div class="cption">{{$product['category'] }}</div>
<div class="desc">{{$product['description'] }}</div>
<div class="price"> {{$product['price'] }}</div>
<div class="imge"><img src='{{ Storage::disk('images')->url($product->image) }}' width=200px 
style='border-radius:25px;margin:auto'></div>
{{-- <img  src="{{asset('/storage/images/'.$product->image)}}" alt="kjkj"> --}}
</div>


@endforeach

@endsection
</body>
</html>

