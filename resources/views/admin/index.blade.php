@extends('layouts.main')

@section('title')
    @parent Admin Border
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
                        <p>CRUD of News</p>
                        @forelse ($news as $item)
                            <h2>{{$item->title}}</h2>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-success">Edit</a>
                                @csrf
                                @method("DELETE")
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        @empty
                            <p>No news here</p>
                        @endforelse
                        {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
