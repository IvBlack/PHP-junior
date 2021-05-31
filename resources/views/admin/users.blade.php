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
            <h2>Users</h2>
            @forelse ($users as $user)
                <div class="card-body">
                    {{ $user->name }}
                    @if($user->is_admin)
                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-danger">Drop the admin!</a>
                    @else
                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-success">Make the admin!</a>
                    @endif
                </div>
            @empty
                <h2>No users</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
