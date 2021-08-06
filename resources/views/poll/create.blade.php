@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <h4>Create</h4>
@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
