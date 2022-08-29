<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

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
     #select{
        color: white;border: none;height:30px ;
        text-align: center;
     }
     input{
        border-radius: 20px;
        border: 1px solid  #112739;
        padding-left: 10px;
     }.material-symbols-outlined {
  font-variation-settings:
  'FILL' 1,
  'wght' 400,
  'GRAD' 0,
  'opsz' 70
}
     
    </style>
</head>
<body>
    @extends('layouts.admindashboard')
    @section('content')


    
    <div class="mycon">
    <table class="mytable"  
    cellpadding="20"
    cellspacing="5">
    <tr>
        <th class="mycption">Name</th>
        <th class="mydesc">Email</th>
        <th class="mydesc">Joining time</th>
        <th class="myprice">Action </th>
   
    </tr>
    </div>
    @foreach ($users as $user)
 <div class="mycon">
<tr id="myrow">
<td class="tdtopleft">{{$user['name'] }}</div></td></td>
<td >{{$user['email'] }}</div></td>
<td >{{$user['created_at'] }}</div></td>
<td >
<table>
    <tr>
    <td>
        
        <a href="{{ route('products.edit',['id'=>$user['id']]) }}"><div class="btnview"><button type="submit" class="btns"> <b>Edit</b></button></div></a></td>
        

    <td><div class="btndelete">
        
        <form action="{{ route('products.delete',['id'=>$user['id']]) }}" method="POST">
            @csrf
            @method('Delete')
        <button type='submit' class="btnss">
         Delete</button>
        </form>
    </div></td>   
       



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


 