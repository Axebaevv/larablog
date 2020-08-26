@extends('layouts.app')
@include('partials.meta_static')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1 class="text-center text-uppercase">Blog Trashes</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($trashedBlogs as $blog)
                    <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }} </a></h2>
                    <p class='text-break'>{{ $blog->body }} </p>
                    {{-- restore --}}
                    <div class="btn-group">
                        <form  method='GET' action="{{ route('blogs.restore', $blog->id) }}" class="my-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                Restore
                            </button>
                            {{ csrf_field() }}
                        </form>
                        <form  method='POST' action="{{ route('blogs.permanentDelete', $blog->id) }}" class="my-4 ml-4">
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-lg">
                                Permanent Delete
                            </button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
