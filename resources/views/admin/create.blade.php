@extends('layouts.main')

@section('title', 'Create new news')


@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <form enctype="multipart/form-data" action="@if(!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif" method="post">
                    @csrf
                    @if ($news->id) @method('PUT') @endif
                        <div class="form-group">
                            <label for="newsTitle">Title of the news</label>
                            @if($errors->has('title'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('title') as $error)
                                    {{ $error }}
                                @endforeach
                                </div>
                            @endif
                            <input type="text" name="title" id="newsTitle" class="form-control" value="{{ $news->title ?? old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="newsCategory">Category news</label>
                            @if($errors->has('category_id'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('category_id') as $error)
                                    {{ $error }}
                                @endforeach
                                </div>
                            @endif
                            <select name="category_id" class="form-control" id="newsCategory">
                                @forelse($categories as $item)
                                @if(old('category_id'))
                                    <option @if($item->id == old('category_id')) selected @endif
                                        value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @else
                                    <option @if($item->id == $news->category_id) selected @endif
                                        value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endif>
                                @empty
                                    <option value="0" selected>No categories</option>
                                @endforelse <option value="55">Wrong category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="newsText">Text of the news</label>
                            @if($errors->has('text'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('text') as $error)
                                    {{ $error }}
                                @endforeach
                                </div>
                            @endif
                            <textarea name="text" id="newsText" class="form-control" rows="5">{{ old('text') ?? $news->text ?? ' ' }}</textarea>
                        </div >
                        <div class="form-group">
                            @if($errors->has('image'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('image') as $error)
                                    {{ $error }}
                                @endforeach
                                </div>
                            @endif
                            <input type="file" name="image">
                        </div>
                        <div class="form-check">
                            @if($errors->has('is_Private'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('is_Private') as $error)
                                    {{ $error }}
                                @endforeach
                                </div>
                            @endif
                            <input @if (old('isPrivate') == 1 ?? $news->isPrivate === 1) checked @endif type="checkbox" name="isPrivate" value="1" class="form-check-input">
                            <label class="form-check-label" for="newsPrivate">Private</label>
                        </div>
                        <div class="form-group row">
                            <input type="submit" class="btn btn-outline-primary" value="@if ($news->id) Update @else Add a new @endif">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
