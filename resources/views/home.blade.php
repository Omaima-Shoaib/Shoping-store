
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* .mycon{
            width: 95%;
            background-color: #f4f5f7;
            margin: auto;
        
            border-radius: 20px;
            padding: 10px;
            margin-top: 10px;
   
        } */
        .mytable{
            margin: auto;
            text-align: center;
            padd
         
        }
        .mycption{
      color: #2b4552;
   
         width:200px;
    }
        .mydesc{
            color: #2b4552;
   
            width:300px;
        }
        .myprice{
            color: #2b4552;
      /* display: inline-flex;
      float: left; */
            width: 50px;
        }
        .myimge{
            /* display: inline-flex;
      float: left; */
      color: #2b4552;

      width: 250px;
        }
        .btns{
            background-color: #112739;
            color: white;
            width:90px;
     
            height: 30px;
            border: none;
            border-radius: 20px;
            text-align: center;
            margin-right: 5px
        }
       
        .btnss{
            background-color:#b5bcc5 ;
            color: white;
            width: 90px;
       
            height: 30px;
            border: none;
            border-radius: 20px;
            text-align: center;
        }
        .action{
            color: #2b4552;

        }
        #myrow{
            border-radius: 25px;
        box-shadow: 10px 0px 10px #11273962;

            
        }
     tr td{
        border-radius: 20px;
        /* box-shadow: 10px 10px 10px #112739; */

     }
    </style>
</head>
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <form action="{{ route('products.filterByCategory')}}">
            <input type="text" name="category" placeholder="Search Product" style="font-size: 18px" id="">
            
            <button type="submit" style="background-color: transparent;border: none;text-align: center;width: fit-content;height: fit-content;">
                <span class="material-symbols-outlined" style="color: #112739;width:30px;">
                search
                </span>

                
            </button>
           </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')
@section('content')



<div class="mycon" style="margin: auto">

{{-- <div class="cption">Category</div>
<div class="desc">Description</div>
<div class="price"> Price</div>
<div class="imge"> --</div>
<div class="btnview">fsds</div>
<div class="btndelete">fds</div> --}}
<table class="mytable"  
cellpadding="20"
cellspacing="5" style="text-align: center">
<tr>
    <th class="mycption">Category</th>
    <th class="myprice">Price </th>
    <th class="myimge">Image</th>
    <th  class="action"></th>
</tr>
</div>
@foreach ($products as $product)
<div class="mycon">
<tr id="myrow">
<td class="tdtopleft">{{$product['category'] }}</div></td></td>
<td> ${{$product['price'] }}</div></td>
<td><img src='{{ Storage::disk('images')->url($product->image) }}' width=200px  style='border-radius:25px;margin:auto;height:auto'></div></td>
<td >
    <td class="title mytitle"> <a style="text-decoration: none;color:white" href="{{ route('products.get',$product['id']) }}"> <div style="background-color: #112739;border-radius: 25px;width: 80px;text-align: center">view</div></a></td>

</td>
</tr>
</div>


@endforeach
</table>

@endsection