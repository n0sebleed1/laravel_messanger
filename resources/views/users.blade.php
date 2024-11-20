@extends('layout.app')

@section('name')
    Find user
@endsection
@section('content')
    <h2>Users List</h2>
    @foreach($usersList as $el)
        @if ($myData->id != $el->id )
            {{ $el->name }}
            <a href="dialog/{{ $el->id }}">Send</a></br>
        @endif
    @endforeach
    <a href="main">Back</a>
@endsection