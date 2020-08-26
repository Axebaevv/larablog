@extends('layouts.app')

{{-- Do not to forget include it, if you will not, it would not work!!! --}}
@include('partials.meta_static')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Users</h1>
        </div>
    </div>
@php
    $usersCount = $users->count();
@endphp
    <div class="container">
        <div class="row">
            <div class="col-4">
                <strong class="text-size-md">Users count:</strong> <span class="badge bg-success text-size-sm ml-3">@php echo $usersCount @endphp</span>
            </div>
            <div class="col-8">
                <div class="d-flex justify-content-md-end align-content-md-center">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($users as $user)
            <div class="col-md-4">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class='my-4'>
                    {{-- @for ($i = 1; $i <= $usersCount; $i++)
                        <div class="col-12">
                            <span class="badge bg-primary text-size-sm mb-3" for="">@php echo $i @endphp</span>
                        </div>
                    @endfor --}}
                    {{ method_field('patch') }}
                        <div class="form-group">
                            <input type="text" name="username" value="{{ $user->name }}" id="" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="role_id" class="form-control">
                                <option value="" selected>{{ $user->role->name }}</option>
                                <option value="2">Author</option>
                                <option value="3">Subscriber</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $user->created_at->diffForHumans() }} " disabled>
                        </div>
                        <button class="btn btn-primary btn-md w-100">Update</button>
                        {{ csrf_field() }}
                    </form>
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                        {{ method_field('delete') }}
                            <button class="btn btn-danger btn-md  w-100">
                                Delete
                            </button>
                        {{ csrf_field() }}
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
