@extends('layouts.app')

@section('title', 'Create poll')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Poll</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('poll.index') }}"> Back</a>
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

    <form
        class="form"
        method="post"
        action="{{ route('poll.store') }}"
    >
        @csrf

        <div class="mb-3">
            <label for="poll" class="form-label">Poll name</label>
            <input
                type="text"
                class="form-control"
                id="poll"
                name="name"
            >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
