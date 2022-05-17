@extends('layouts.main')

@section('title')
    @parent News
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
     <div id="app">
        <example-component></example-component>
     </div>
@endsection


