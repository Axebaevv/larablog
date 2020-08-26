<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Hi {{ $user->name }}</h2>
    <hr>
    <p class="lead">A new blog titled "{{ $blog->title }}" has been published in larablog.com</p>
</body>
</html>
