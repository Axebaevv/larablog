@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <p class="lead text-size-lg">You are in {{ $category->name }} Category</p>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $category->name }}</h1>
                <div class="btn-group">
                    <ul class="navbar-nav ml-auto mr-4">
                        <li>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-lg">Edit</a>
                        </li>
                    </ul>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        {{ method_field('delete') }}
                        <button name='delete' type="submit" class="btn btn-danger btn-lg">Delete</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center text-size-lg">
            Blogs lists
            <hr class="center-hr">
        </div>
        @foreach ($category->blog as $blog)
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h2><a href="{{ route('blogs.show', $blog->id) }}" class="">{{ $blog->title }}</a></h2>
                    <h3>{{ $blog->body }}</h3>
                    <hr>
                </div>
            </div>
        @endforeach
    </div>
@endsection
