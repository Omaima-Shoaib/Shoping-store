
    @extends('layouts.admindashboard')
 

    @section('content')
    @foreach($users as $user)
    {{ $user['name'] }}
    @endforeach
    @endsection