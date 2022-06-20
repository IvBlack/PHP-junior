@extends('layouts.layout')

@section('content')
    <form action="{{ route('post.update', ['id'=>$post->post_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Rip post</h3>
        <div class="form-group">
            <input type="text" name="title" class="form-control" required value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="descr" rows="10" required>{{ $post->descr }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="img">
        </div>
        <input type="submit" value="Rip the post" class="btn btn-outline success">
    </form>
@endsection
