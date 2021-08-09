@extends('layouts.app')

@section('title', 'Index')

@section('content')

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
