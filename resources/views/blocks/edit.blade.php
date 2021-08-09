@extends('layouts.app')

@section('title', 'Edit')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Block</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('poll.show', $block->poll->id) }}"> To Poll list</a>
                <a class="btn btn-primary" href="{{ route('blocks.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blocks.update',$block->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $block->name }}" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <label for="PollDataList" class="form-label">Poll</label>
                    <input class="form-control"
                           list="datalistOptionsPoll"
                           id="PollDataList"
                           placeholder="Poll"
                           name="poll_id"
                           value="{{ $block->poll_id }}"
                    >
                    <datalist id="datalistOptionsPoll">
                        @foreach ($polls as $poll)
                            <option value="{{ $poll->id }}">{{ $poll->name }}</option>
                        @endforeach
                    </datalist>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <label for="exampleDataList" class="form-label">Poll type</label>
                    <input class="form-control"
                           list="datalistOptions"
                           id="exampleDataList"
                           placeholder="Type"
                           name="type_id"
                           value="{{ $block->type_id }}"
                    >
                    <datalist id="datalistOptions">
                        @foreach ($types as $type)

                            @if($type->id == $block->type_id)
                                <option value="{{ $type->id }}" selected>{{ $type->type }}</option>
                            @else
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endif

                        @endforeach
                    </datalist>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
