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
                        <p>News</p>
                        @forelse ($news as $item)
                        <h2>{{$item->title}}</h2>
                        <div class="card-image" style="background-image: url({{ $item->image ?? asset('storage/bmw.jpg') }})"></div>
                            @if (!$item->isPrivate)
                                <a href="{{route('news.show', $item->id)}}">More details...</a><br>
                             @endif
                        @empty
                            <p>No news here</p>
                        @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
    <h3></h3>
@endsection


