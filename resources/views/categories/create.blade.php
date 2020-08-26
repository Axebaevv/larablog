@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1 class="text-center text-uppercase">Create a new Category</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('categories.store') }}" method="post">
                        <div class="form-group">
                            <label for="title" class="text-size-md">Name</label>
                            <input type="text" name="name" class='form-control' placeholder="Write your title...">
                        </div>
                        <button class="btn btn-primary btn-lg mt-3" type="submit">Submit</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
