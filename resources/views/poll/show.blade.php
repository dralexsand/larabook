@extends('layouts.app')

@section('title', 'Show polls')

@section('content')
    <h4>Show</h4>

    <hr>

    <h1>Poll name: {{ $poll->name }}</h1>
    <p>
        <a href="/poll/{{ $poll->id }}/edit">Edit poll name</a>
    </p>
    <hr>

    @foreach($poll->blocks as $block)

        <h2>Block name: {{ $block->name }}</h2>
        <b>Question: {{ $block->question->content }}</b>
        <br>
        <b>List type: {{ $block->type_id }}</b>
        <hr>

        <ul>
            @foreach($block->pollitems as $pollitem)
                <li>{{ $pollitem->content }}</li>
            @endforeach
        </ul>

        <hr>

    @endforeach

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
