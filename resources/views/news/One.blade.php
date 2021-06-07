@extends('layouts.main')

@section('title')
    @parent News
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
                    @if(!$news->isPrivate)
                        <h2><?=$news->title?></h2>
                        <div class="card-image" style="background-image: url({{ $news->image ?? asset('storage/bmw.jpg') }})"></div>
                        <p><?=$news->text?></p>
                    @else
                        New is private, authorize for watching..
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

