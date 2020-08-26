@extends('layouts.app')

@include('partials.meta_dynamic')
@section('content')
<div class="container-fluid">
    <article>
        <div class="jumbotron">
            <h1>Author:</h1>&nbsp;<span class="text-size-sm">{{ $user->name }}</span>
        </div>
    </article>
</div>
@endsection
