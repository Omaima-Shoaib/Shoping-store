<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .myimg{
            width: 40%;
            display: inline;
            float: left;
            background-color: brown;
            height: 400px;
        }
        .sideImages{
        
        display: inline;
        margin-top: 0;
        margin-left: 10px;
        width:45%;
        float: left;     
  
    
    }
    .mycntnt{
        margin-left: 50px;
        width: 40%;
        float: left;
        background-color: #f4f5f7;
        display: inline;
        border-radius: 20px;
        padding-left: 10px;
        height: 450px;
    }
    .key{
            display: inline-flex;
            width: 100px;
            margin-left: 15px;
            font-size: 20px;
            color: #112739;
            margin-top: 20px;
            margin-left: 20px;
            
        }
        .desc{
            display: inline-flex;
      
          margin-right: 15px;
          margin-left: 0px;
          font-size: 18px;
          color: #848484;
          margin-top: 0%;
          margin-left: 20px;
        }
        .price{
            display: inline-flex;
            width: 100px;
            margin-left: 15px;
            font-size: 20px;
            color: #112739;
            margin-top: 30px;
            margin-left: 20px;
        }
     
        .counter{
background-color: transparent;
border: none;
font-size: 20px;
text-align: center;
width: 30px;
        }
        #add{
            background-color: #112739;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border:1px solid #112739;
            border-radius: 100%;
            font-size: 20px;
            text-align: center
            
        }
        #add:hover{
            color: #112739;
            background-color: transparent;
            border:1px solid #112739;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            font-size: 20px;
            box-shadow:5px 5px 10px #9e9e9e;

            
        }
        .countercontainer{
            /* margin: auto; */
            width: 40%;
            margin-left: 20px;
            margin-top: 40px
        }
        .crtbtncontainer{
            width: fit-content;
            margin: auto;
            height: fit-content;
        }
        .crtbtn{
            margin: auto;
            background-color: #112739;
            color: white;
            width: 120px;
            margin-top: 50px;
            height: 30px;
            border: none;
            border-radius: 20px;
            text-align: center;
            margin-right: 5px;
            box-shadow:10px 10px 10px #9e9e9e;

        }
   
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <div>
        @foreach($products as $product)
        <div class="sideImages">
            <img src='{{ Storage::disk('images')->url($product->image) }}' width=100%  style='border-radius:25px'>
        </div>
    <div class="mycntnt">
      
        <div class="key"> 
            <b> {{$product['category'] }}</b>
            </div>
          
    
            <br>
            <div class="">
        <div class="desc">
           {{$product['description'] }}
            </div>
        </div>
              
        <div class="price"> 
       
            ${{$product['price'] }}
            </div>
          <div>
          <form action="{{ route('cart.store',['id'=>$product['id'],'price'=>$product['price'],'quantity'=>'quantity']) }}" method="post">

        <div class="countercontainer">
            <button type="button" onclick="CountFun()" id="add">+</button>
        <input type="text" hidden name="price" value="{{ $product['price'] }}">
        {{-- <input type="text" hidden name="total" value="{{ $product['price'] }}"> --}}
          <input type="text" name="quantity"  id="quantityvalue" value='1' class="counter">
<input type="text" hidden name="image" value="{{ $product['image'] }}">
            <button type="button" onclick="CountDown()" id="add">-</button>
            <input type="text" name="category" value=" {{$product['category'] }} " hidden>
            <input type="text" name="description" value=" {{$product['description'] }} " hidden>

          </div>
          <div class='crtbtncontainer'>
          <button class="crtbtn" onclick="changecontent()" id="addbtn" type="submit"> Add to Cart</button>
        </form>
        </div>
        </div>
    </div>
        @endforeach
    </div>
    @endsection


    <script>
        

        var cnt=0;
    function CountFun(){
     cnt=parseInt(cnt)+parseInt(1);
     var divData=document.getElementById("quantityvalue");
     divData.value=cnt ;
     console.log(cnt);
    }
    function CountDown(){
        let value=document.getElementById("quantityvalue").value;
        if(value>0){
     cnt=Number(document.getElementById("quantityvalue").value)-parseInt(1);
     var divData=document.getElementById("quantityvalue");
     divData.value=cnt ;
     console.log(cnt);}
            else return;
    }
    function changecontent(){
       alert('Itme is added to cart ');
    }

 function add(){
    // let counter=document.getElementById('quantity');
    // let x=Number( document.getElementById('quantity').value);
    // document.getElementById('quantity').innerHTML=x++;
    // console.log(x);

/*let buttonHome = document.getElementById('add');
 let counter=document.getElementById('quantity');
    let x=Number( document.getElementById('quantity').value);
    
  document.getElementById('quantity').innerHTML=` ${x++}`;
  console.log(x);
*/

}
    </script>
</body>
</html>