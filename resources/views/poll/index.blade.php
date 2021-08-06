@extends('layouts.app')

@section('title', 'List')

@section('content')
    <h4>List</h4>
@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
