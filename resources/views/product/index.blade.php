<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
<body>
    @extends('layouts.admindashboard')
    @section('content')


    
    <div class="mycon">

    {{-- <div class="cption">Category</div>
    <div class="desc">Description</div>
    <div class="price"> Price</div>
    <div class="imge"> --</div>
    <div class="btnview">fsds</div>
    <div class="btndelete">fds</div> --}}
    <table class="mytable"  
    cellpadding="20"
    cellspacing="5">
    <tr>
        <th class="mycption">Category</th>
        <th class="mydesc">Description</th>
        <th class="myprice">Price </th>
        <th class="myimge">Image</th>
        <th  class="action">Action</th>
    </tr>
    </div>
    @foreach ($products as $product)
 <div class="mycon">
<tr id="myrow">
<td class="tdtopleft">{{$product['category'] }}</div></td></td>
<td >{{$product['description'] }}</div></td>
<td> {{$product['price'] }}</div></td>
<td><img src='{{ Storage::disk('images')->url($product->image) }}' width=200px  style='border-radius:25px;margin:auto;height:auto'></div></td>
<td >
<table>
    <tr>
    <td><div class="btnview"><button type="submit" class="btns"> <b>Edit</b></button></div></td>
    <td><div class="btndelete"><button type="reset" class="btnss"> <b> Delete</b></button></div></td>
    </tr>      
</table>
</td>
</tr>
</div>


@endforeach

@endsection
</table>
</body>
</html>

