<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>

<h1>Forget Password Email</h1>

<h2> Hi, <b>{{ $password_resets->nickname}}</b></h2>

You can reset password from bellow link:
<a href="{{ route('reset.password.get', $password_resets->token) }}">Reset Password</a>

</body>
</html>
