@extends('layouts.app')

@section('title', 'Show')

@section('content')
    <h4>Show</h4>
@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
