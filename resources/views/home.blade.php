
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
</head>
@extends('layouts.app')

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
@endsection
