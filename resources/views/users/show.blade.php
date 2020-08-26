@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h2>{{ $user->name }}'s recent blogs</h2>
                <p class="">Role: {{ $user->role->name }}</p>
            </div>
        </div>
        <div class="container">
            <ol class='text-size-md'>
                @foreach ($user->blogs as $blog)
                    <li><a href="{{ route('blogs.show', $blog->slug) }}" class='text-size-md'>@php echo $blog->title;@endphp</a></li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
