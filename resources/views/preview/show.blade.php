@extends('layouts.app')

@section('title', 'Show')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Preview poll Id: {{ $poll->id }}, Name: {{ $poll->name }}</h2>
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

    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

            @if(!empty($poll->blocks))
                @foreach ($poll->blocks as $block)
                    <h4>Block Id: {{ $block->id }} Block name: {{ $block->name }}</h4>
                @endforeach
            @endif

        </div>
    </div>

@endsection

@section('footerScripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
