@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1>Edit a category</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        {{ method_field('patch') }}
                        <div class="form-group">
                            <label for="title" class='text-size-md'>Change</label>
                            <input type="text" name="name" class='form-control' placeholder="Write your title..." value="{{ $category->name }}">
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        {{ csrf_field() }}
                    </form>
                </div>
        </div>
        </div>
    </div>
@endsection
