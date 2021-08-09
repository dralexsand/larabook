@extends('layouts.app')

@section('title', 'Create')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Block</h2>
            </div>
            <div class="pull-right">
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

    <form action="{{ route('blocks.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
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

                    <label for="TypesDataList" class="form-label">Poll type</label>
                    <input class="form-control"
                           list="datalistOptionsTypes"
                           id="TypesDataList"
                           placeholder="Type"
                           name="type_id"
                           value="2"
                    >
                    <datalist id="datalistOptionsTypes">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
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
