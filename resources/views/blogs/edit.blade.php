@extends('layouts.app')
@include('partials.tinymce')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1>Edit | {{ $blog->title }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('blogs.update', $blog->id)}}" method="post">
                        {{ method_field('patch') }}
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name="title" class='form-control' placeholder="Write your title..." value="{{ $blog->title }}">
                        </div>
                        <div class="form-group">
                            <label for="body"></label>
                            <textarea name="body" id="" class='form-control' cols="30" rows="10" placeholder="Write your body...">{!! $blog->body !!}</textarea>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <span class="mr-3 text-size-md"><strong>{{ $blog->category->count() ? 'Current categories: ' : '' }}</strong></span>
                            @foreach ($blog->category as $category)
                                <input type="checkbox" name="category_id[]" class="form-check-input mr-2" value="{{ $category->id }}" id="" checked>
                                <label for="" class="form-check-label mr-3">{{ $category->name  }}</label>
                            @endforeach
                        </div>
                        {{-- Unused categories checker --}}
                        <div class="form-group form-check form-check-inline">
                            <span class="mr-3 text-size-md"><strong>{{ $filtered->count() ? 'Unused categories: ' : '' }}</strong></span>
                            @foreach ($filtered as $category)
                                <input type="checkbox" name="category_id[]" class="form-check-input mr-2" value="{{ $category->id }}" id="" >
                                <label for="" class="form-check-label mr-3">{{ $category->name  }}</label>
                            @endforeach
                        </div>
                        <br>
                        <div class="btn-group">
                            <button class="btn btn-info btn-lg mt-4" type="submit">Submit</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
