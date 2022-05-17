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
                    <h1>Category's news...</h1>
                        @forelse($news as $item)
                        <h2>{{ $item['title'] }}</h2>
                            @if(!$item['isPrivate'])
                             <a href="{{ route('news.show', $item['id']) }}">More details...</a></br>
                            @endif
                        @empty
                            No news here.
                        @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
