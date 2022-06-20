@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h2>{{ $post->title }}</h2></div>
            <div class="card-body">
                <div class="card-img card-img__max" style="background-image: url({{ $post->img ?? asset('img/default.jpg') }})"></div>
                <div class="card-author">Author: {{ $post->name }}</div>
                <div class="card-date">Post created at: {{ $post->created_at->diffForHumans() }}</div>
                <div class="card-btn">
                    <a href="{{ route('post.index') }}" class="btn btn-outline-primary">To the main page</a>
                    <a href="{{ route('post.edit', ['id'=>$post->post_id]) }}" class="btn btn-outline-warning">Rip page</a>
                    <a href="{{ route('post.destroy', ['id'=>$post->post_id]) }}" class="btn btn-outline-danger">Destroy post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
