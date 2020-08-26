@extends('layouts.app')

@section('content')
@include('partials.meta_admin')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                @if (Auth::user() && Auth::user()->role_id === 1)
                <h1>Admin Dashboard</h1>
                @elseif (Auth::user() && Auth::user()->role_id === 2)
                <h1>Author Dashboard</h1>
                @else
                <h1>Subscriber Dashboard</h1>
                @endif
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if (Auth::user() && Auth::user()->role_id === 1)
                    <div class="col-md-4  text-center text-lg-left text-md-left">
                        <label for="" class="text-size-lg">Blogs controller</label>
                    </div>
                    <div class="col-md-8">
                        <a href="{{ route('blogs.create') }}" class='mr-3 btn btn-primary btn-lg text-white text-decoration-none'> Create a Blog</a>
                        <a href="{{ route('blogs.trash') }}" class="mr-3 btn btn-danger btn-lg text-white">Blog Trashes</a>
                        <a href="{{ route('admin.blogs') }}" class="mr-3 btn btn-secondary btn-lg text-white">Published/Draft</a>
                    </div>
                @elseif (Auth::user() && Auth::user()->role_id === 2)
                    <div class="col-md-4  text-center text-lg-left text-md-left">
                        <label for="" class="text-size-lg">Blogs controller</label>
                    </div>
                    <div class="col-md-8">
                        <a href="{{ route('blogs.create') }}" class='mr-3 btn btn-primary btn-lg text-white text-decoration-none'> Create a Blog</a>
                    </div>
                @else
                    <div class="col-md-4  text-center text-lg-left text-md-left">
                        <label for="" class="text-size-lg">Blogs controller</label>
                    </div>
                    <div class="col-md-8">
                        <a href="#" class=' mr-3 btn btn-primary btn-lg text-white text-decoration-none'> What can I do?</a>
                    </div>
                @endif
            </div>
            <hr>
            <div class="row mt-3">
                @if (Auth::user() && Auth::user()->role_id === 1)
                    <div class="col-md-4 text-center text-lg-left text-md-left">
                        <label for="" class="text-size-lg">Categories controller</label>
                    </div>
                    <div class="col-md-8">
                        <a href="{{ route('categories.create') }}" class=" mr-3 btn btn-success btn-lg text-white">Create Category</a>
                        <a href="{{ route('blogs.trash') }}" class="mr-3 btn btn-danger btn-lg text-white">Category Trashes</a>
                    </div>
                @elseif (Auth::user() && Auth::user()->role_id === 2)
                    <div class="col-md-4 text-center text-lg-left text-md-left">
                        <label for="" class="text-size-lg">Categories controller</label>
                    </div>
                    <div class="col-md-8">
                        <a href="{{ route('categories.create') }}" class=" mr-3 btn btn-success btn-lg text-white">Create Category</a>
                    </div>
                @elseif (Auth::user() && Auth::user()->role_id === 3)
                @endif
            </div>
            <hr>
             <div class="container">
            <div class="row">
                @if (Auth::user() && Auth::user()->role_id === 1)
                    <div class="col-md-4  text-center text-lg-left text-md-left">
                        <label for="" class="text-size-lg">Users controller</label>
                    </div>
                    <div class="col-md-8">
                        <a href="#" class='mr-3 btn btn-primary btn-lg text-white text-decoration-none'> Create a user</a>
                        <a href="{{ route('admin.users') }}" class='mr-3 btn btn-primary btn-lg text-white text-decoration-none'> View All Users</a>
                        <a href="#" class="mr-3 btn btn-danger btn-lg text-white">User Trashes</a>
                        <a href="#" class="mr-3 btn btn-secondary btn-lg text-white">Active/Locket</a>
                    </div>
                @endif
            </div>
            <hr>
        </div>
    </div>
@endsection
