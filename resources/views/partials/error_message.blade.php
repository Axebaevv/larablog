@if (count($errors))
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li class="list-unstyled">{{ $error }}</li>
        @endforeach
    </div>
@endif
