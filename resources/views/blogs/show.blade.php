@extends('layouts.app')

@include('partials.meta_dynamic')
@section('content')
<div class="container-fluid">
    <article>
        <div class="jumbotron">
            <div class="container">
                <h1>{{ $blog->title }}</h1>
                @if (Auth::user() )
                    @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $blog->user_id)
                        <div class="d-flex  justify-content-start mt-4">
                            <a class='  btn btn-primary button-color btn-lg' href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                            <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                                {{ method_field('delete') }}
                                    <button type="submit" class='btn btn-danger btn-lg ml-3'>Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center position-relative">
                    @if ($blog->featured_image)
                        <img  class='featured_image' src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}">
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mt-5">{!! $blog->body !!}</p>
                    @if ($blog->user)
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end ">
                                Author: &nbsp; <a href="{{ route('users.show', $blog->user->name) }}"&nbsp;>{{ $blog->user->name }}</a> &nbsp; | Posted: {{ $blog->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <strong class='text-size-md'>Categories:</strong>
                    @foreach ($blog->category as $category)
                        <span class='text-size-sm ml-3'><a href="{{ route('categories.show', $category->slug) }}" class="">{{ $category->name }}</a></span>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
    <hr>
    <article>
        <div id="disqus_thread">
            <div id="disqus_thread"></div>
                <script>
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://larablog-kluhyd4itg.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                    </script>

        </div>
    </article>
</div>
@endsection
