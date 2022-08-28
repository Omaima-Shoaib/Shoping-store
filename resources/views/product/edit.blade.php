
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .containerss{
        
            width: 50%;
            height: 450px;
            background-color: #b5bec526;
            border-radius: 20px;
            text-align: center;
            padding-top: 20px;
            float: left;
            margin-top: 25px;
        }
        .key{
            display: inline-flex;
            float: left;
            width: 100px;
            margin-left: 15px;
            font-size: 20px;
            color: #112739;
        }

        .value{

        }
        input{
            border: 1px solid #112739;
            border-radius: 20px;
            padding-left: 10px;
            padding-right: 10px
        }
        textarea{
            border: 1px solid #112739;
            border-radius: 20px;
            padding-left: 10px;
            
        }
        .file{
            border: 1px solid #112739;
            border-radius: 20px;
            padding-left: 10px;
            padding-right: 10px;
        padding-top: 4px;
        padding-bottom: 4px;
        color: #21617c;
        }
        .btns{
            background-color: #112739;
            color: white;
            width: 120px;
            margin-top: 50px;
            height: 30px;
            border: none;
            border-radius: 20px;
            text-align: center;
            margin-right: 5px
        }
       
        .btnss{
            background-color:#b5bcc5 ;
            color: white;
            width: 120px;
            margin-top: 50px;
            height: 30px;
            border: none;
            border-radius: 20px;
            text-align: center;
        }
        .sideImages{
        
            display: inline;
            margin-top: 0;
            margin-left: 10px;
            width:45%;
            float: left;     
            height: ;   
        
        }
       </style>
</head>
<body>
    
@extends('layouts.admindashboard')
@section('content')
@foreach($products as $product)
    <div class="containerss">
        {{-- <form style='margin:auto'  enctype="multipart/form-data" action=" {{ route('products.update',$product['id']) }}" method='POST' > --}}
            <form action="{{ route('products.update',$product['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="myform">
            
<div class="key">Category</div>
<div class="value"><input type="text" name="category" id="" value=" {{ $product['category'] }}">    </div>
<br>
<div class="key">Price</div>
<div class="value"><input type="text" name="price" id="" value="{{ $product['price'] }}" >    </div>
<br>
<div class="key">Description</div>
<div class="value"><textarea type="text" name="description" id=""  value='{{ $product['description'] }}' > {{ $product['description'] }} </textarea>  </div>
<br>
<div class="key">Image</div>
<br>
<div class="value"> 
    <input type="file" name="images"  value=" {{ Storage::disk('images')->url($product->image) }}" >
    
</div>

    <button type="submit" class="btns"> <b> Edit</b></button>
    <button type="reset" class="btnss"> <b> Clear</b></button>



            </div>      
        </div>
    </form>
    </div>
    
    <div class="sideImages">
        <img src='{{ Storage::disk('images')->url($product->image) }}' width=100%  style='border-radius:25px'>
    </div>

@endforeach

@endsection
</body>
</html>












































