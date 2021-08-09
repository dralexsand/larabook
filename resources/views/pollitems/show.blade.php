@extends('layouts.app')

@section('title', 'Show')

@section('content')

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
