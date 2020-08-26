@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1 class="text-center text-uppercase">categories Trashes</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($trashedCategories as $category)
                    <h2><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }} </a></h2>
                    {{-- restore --}}
                    <div class="btn-group">
                        <form  method='GET' action="{{ route('categories.restore', $category->id) }}" class="my-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                Restore
                            </button>
                            {{ csrf_field() }}
                        </form>
                        <form  method='POST' action="{{ route('categories.permanentDelete', $category->id) }}" class="my-4 ml-4">
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
