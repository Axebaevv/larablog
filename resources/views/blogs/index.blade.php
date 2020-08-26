@extends('layouts.app')

{{-- Do not to forget include it, if you will not, it would not work!!! --}}
@include('partials.meta_static')
@section('content')
    <div class="container">
        {{-- Blog created message --}}
        @if (Session::has('blog_created_message'))
            <div class="alert alert-success">
                {{ Session::get('blog_created_message') }}
                {{-- The x to close --}}
                <button type="button" class='close' data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
        {{-- Contact form send --}}
        @if (Session::has('contact_created_message'))
            <div class="alert alert-success">
                {{ Session::get('contact_created_message') }}
                {{-- The x to close --}}
                <button type="button" class='close' data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
            @foreach ($blogs as $blog)
                <div class="col-md-8 offset-md-2 text-center">
                    <h2><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }} </a></h2>
                    <div class="col-md-12 text-center position-relative">
                        @if ($blog->featured_image)
                            <img  class='featured_image_index' src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}">
                            <br>
                        @endif
                    </div>
                    <span class='text-break lead'>{!! Str::limit($blog->body, 200) !!} </span>
                    @if ($blog->user)
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end ">
                                    Author: &nbsp; <a href="{{ route('users.show', $blog->user->name) }}"&nbsp;>{{ $blog->user->name }}</a> &nbsp; | Posted: {{ $blog->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <br><hr><br>
            @endforeach
    </div>
@endsection
