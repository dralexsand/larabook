@extends('layouts.app')

@section('title', 'List polls')

@section('content')
    <h4>List polls</h4>

    <hr>

    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Polls list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('poll.create') }}"> Create New Poll</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <hr>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($data as $key => $poll)
            <tr>
                <td>{{ $poll->id }}</td>
                <td>{{ $poll->name }}</td>
                <td>
                    <form action="{{ route('poll.destroy',$poll->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('poll.show',$poll->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('poll.edit',$poll->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $data->links() !!}

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
