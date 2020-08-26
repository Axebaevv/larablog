@extends('layouts.app')

<!-- Sript For Make a Comment-->
@include('partials.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1 class="text-center text-uppercase">Create a new blog</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                        {{-- @include('partials.error_message') --}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class='form-control' placeholder="Write your title..." value="{{ old('title')}}">
                            @error('title')
                            <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group form-check form-check-inline">
                            @foreach ($categories as $category)
                                <input type="checkbox" name="category_id[]" class="form-check-input mr-2" value="{{ $category->id }}" id="">
                                <label for="" class="form-check-label mr-3">{{ $category->name  }}</label>
                            @endforeach
                        </div>
                        <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        </div>
                        {{-- <div class="row">
                            <div class="my-3 form-group">
                                <label class="btn btn-default">
                                    <span class="btn btn-outline btn-lg btn-info">Featured Image</span>
                                    <input type="file" name="featured_image" class="form-control" hidden>
                                </label>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea name="body" id="default" class='form-control' cols="30" rows="10" placeholder="Write your body...">
                                {{ old('body') }}
                            </textarea>
                            @error('body')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
