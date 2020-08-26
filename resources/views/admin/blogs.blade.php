@extends('layouts.app')

{{-- Do not to forget include it, if you will not, it would not work!!! --}}
@include('partials.meta_static')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Manage Blogs</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2><strong>Published</strong></h2>
                <hr>
                @foreach ($publishedBlogs as $blog)
                <div class="mb-5">
                    <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }} </a></h3>
                    <span class='text-break'>{!! Str::limit($blog->body, 100 ) !!} </span>
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                        {{ method_field('patch') }}
                        <input name="status" type="hidden" value="0" id="" checked>
                        <button type="submit" class=" mb-3  btn btn-success btn-xs" name="draft">Save as a draft</button>
                        {{ csrf_field() }}
                    </form>
                </div>
                @endforeach
            <hr>
            </div>
            <div class="col-md-6">
                <h2><strong>Drafts</strong></h2>
                <hr>
                @foreach ($draftBlogs as $blog)
                    <div class="mb-5">
                        <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }} </a></h3>
                        <h4>{!! Str::limit($blog->body, 100 ) !!} </h4>
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                            {{ method_field('patch') }}
                            <input name="status" type="hidden" value="1" id="" checked>
                            <button type="submit" class=" btn btn-success btn-xs" name="draft">Save as a published</button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
