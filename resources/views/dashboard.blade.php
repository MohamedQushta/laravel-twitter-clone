@foreach ($usersList as $user )
    <h1> {{ $user['name'] }}</h1>
    {{-- this prints the values in the name value of the user list --}}
    <h2> {{ $user['age'] }}</h2>
    <hr>
    @if ($user['age'] < 18)
        <p> user cant drive </p>

    @endif
@endforeach
