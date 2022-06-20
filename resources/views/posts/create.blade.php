@extends('layouts.layout')

@section('content')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Create post</h3>
        <div class="form-group">
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="descr" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="img">
        </div>
        <input type="submit" value="Make a post" class="btn btn-outline success">
    </form>
@endsection
