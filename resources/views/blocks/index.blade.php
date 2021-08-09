@extends('layouts.app')

@section('title', 'Index')

@section('content')

    <a class="btn btn-success" href="{{ route('poll.index') }}"> To Poll list</a>

    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blocks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blocks.create') }}"> Create New Block</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->poll->name }} | {{ $value->name }}</td>
                <td>
                    <form action="{{ route('blocks.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('blocks.show',$value->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('blocks.edit',$value->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
