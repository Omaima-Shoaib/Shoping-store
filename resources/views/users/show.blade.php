@foreach($users as $user)
{{ $user['name'] }}
{{ $user['email'] }}
{{ $user['created_at'] }}


@endforeach
