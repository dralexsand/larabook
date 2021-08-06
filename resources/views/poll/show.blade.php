@extends('poll.layout.app')

@section('title', 'Dashboard')

@section('content')
    <h4>Welcome</h4>
@endsection

@section('footerScripts')
    @parent
    <script src="dashboard.js"></script>
@endsection
