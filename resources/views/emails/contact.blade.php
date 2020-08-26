@extends('layouts.app')

<!-- Sript For Make a Comment-->
@include('partials.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1 class="text-center text-uppercase">Contact page</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('mail.send') }}" method="POST">
                        @include('partials.error_message')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="name" class='form-control' placeholder="Write your title..." value="{{ old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class='form-control' placeholder="Write your email..." value="{{ old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" class='form-control' placeholder="Write your subject..." value="{{ old('subject')}}">
                        </div>
                        <div class="form-group">
                            <label for="mail_message">Message</label>
                            <textarea name="mail_message" id="mail_message" class='form-control' cols="30" rows="10" placeholder="Write your message...">
                                {{ old('message') }}
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
