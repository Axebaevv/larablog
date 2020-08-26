<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>You have received a new message from {{ $name }} and {{ $email }}</h2>
    <hr>
    <div>
        <p> {!! $subject !!} </p>
        <p> {!! $mail_message !!} </p>
        <h5>This message is send to from larablog.com</h5>
    </div>
</body>
</html>
