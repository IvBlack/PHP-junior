@extends('layouts.main')

@section('title')
    @parent Test 2
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <p>test 2</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


