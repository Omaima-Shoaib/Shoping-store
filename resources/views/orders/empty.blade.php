<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
          .empty{
        text-align: center;
        margin-top: 100px;
       }
       .emptyp{
        color: #2b4552
       }
    </style>
    <title>Document</title>
</head>
<body>

    @extends('layouts.app')
    @section('content')


    <div class="empty">

        <span class="material-symbols-outlined" style="color: #2b4552;font-size: 90px">
            sentiment_dissatisfied
            
            </span>
            <br>
          <p class="emptyp">  Empty Orders list</p>
    
      </div>
    @endsection
</body>
</html>