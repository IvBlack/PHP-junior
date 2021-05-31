@extends('layouts.main')

@section('title')
    @parentMain
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>Welcome home!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

