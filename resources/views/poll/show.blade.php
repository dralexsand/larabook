@extends('layouts.app')

@section('title', 'Show polls')

@section('content')

    <h2>Poll name: {{ $poll->name }}</h2>
    <p>
        <a href="/poll/{{ $poll->id }}/edit">Edit poll name</a>
    </p>

    <a class="btn btn-success" href="{{ route('poll.index') }}"> To Poll list</a>

    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blocks list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blocks.create') }}"> Create New Block</a>
            </div>
        </div>
    </div>
    <hr>


    @if(isset($poll->blocks))

        @foreach($poll->blocks as $block)

            <h2>
                <a href="/blocks/{{ $block->id }}/edit">
                    Block: {{ $block->name }}
                </a>
                <form action="{{ route('blocks.destroy',$block->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('blocks.show',$block->id) }}">Preview block</a>
                    <a class="btn btn-primary" href="{{ route('blocks.edit',$block->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                    @unless(isset($block->question))
                        <a class="btn btn-success" href="{{ route('questions.create') }}">Add question</a>
                    @endunless
                    <a class="btn btn-warning" href="{{ route('pollitems.create') }}">Add pollitem</a>
                </form>
            </h2>

            @if(isset($block->question))

                <b>Question: {{ $block->question->content }}</b>
                <br>
                <b>List type: {{ $block->type_id }}</b>
                <hr>

                @if(isset($block->pollitems))
                    <ul>
                        @foreach($block->pollitems as $pollitem)
                            <li>{{ $pollitem->content }}
                                <span>
                                    <form action="{{ route('pollitems.destroy',$pollitem->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('pollitems.edit',$pollitem->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @unless(isset($block->question))
                                            <a class="btn btn-success" href="{{ route('questions.create') }}">Add question</a>
                                        @endunless
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                @else
                    <br>
                    <p>No pollitems data</p>
                @endif

            @else
                <br>
                <p>No question data</p>
            @endif

        @endforeach


    @else
        <br>
        <p>No blocks data</p>
    @endif


@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
