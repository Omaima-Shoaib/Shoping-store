<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .containerss{
            margin: auto;
            width: 40%;
            height: 450px;
            background-color: #b5bec526;
            border-radius: 20px;
            text-align: center;
            padding-top: 20px
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
       
    </style>
</head>
<body>
    
    @extends('layouts.admindashboard')
@section('content')

    <div class="containerss">
    <form action=" {{ route('products.store') }} " method="post" enctype="multipart/form-data">
        <div class="myform">
<div class="key">Category</div>
<div class="value"><input type="text" name="category" id="">    </div>

<br>
<div class="key">Price</div>
<div class="value"><input type="text" name="price" id="">    </div>
<br>
<div class="key">Description</div>
<div class="value"><textarea type="text" name="description" id="">  </textarea>  </div>
<br>


<div class="key">Image</div>
<div class="value"> 
    <input type="file" name="image" class="file "  >    
</div>
    <button type="submit" class="btns"> <b> Create</b></button>
    <button type="reset" class="btnss"> <b> Clear</b></button>



            </div>      
        </div>
    </form>
    </div>
@endsection
</body>
</html>