@extends('layout.app')

@section('name')
    Messanger
@endsection
@section('content')
    <h2>Menu</h2>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>
    <a href="users">Find user</a>
    <h2>Contacts</h2>
    <ul>
        @foreach($contacts as $el)
        <li>
            {{ $el->user->name}}
            @if ($el->new_messages > 0)
                ({{ $el->new_messages }})
            @endif
            <a href="/dialog/{{ $el->recipient }}">Open dialog</a>
        </li>
        @endforeach
    </ul>
@endsection