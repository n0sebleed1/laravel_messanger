@extends('layout.app')

@section('name')
    Dialog
@endsection
@section('content')
    <h2>{{ $recipient->user->name }}</h2>
    @foreach($message as $el)
        <p>{{ $el->senderUser->name }} | {{ $el->text }} | {{ $el->created_at }}</p>
    @endforeach
    <form action="{{ route('send', ['id' => $recipient->user->id]) }}" method="post">
        @csrf
        <input autocomplete="off" type="text" name="text" placeholder="Type text...">
        <input type="submit" value="Send">
        <a href="../main">Back</a>
    </form>
@endsection