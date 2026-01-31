<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
@include('header')
<div class="container">
<h1>Регистрация</h1>
<form action="{{ route('register') }}" method="post">
    @csrf

    <div class="form-group">
        <label>Логин</label><br>
        <input type="text" name="login" ><br>
        @error('login')
        <small>{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Пароль</label><br>
        <input type="text" name="password" ><br>
        @error('password')
        <small>{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>ФИО</label><br>
        <input type="text" name="name" ><br>
        @error('name')
        <small>{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Телефон</label><br>
        <input type="text" name="phone" ><br>
        @error('phone')
        <small>{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>E-mail</label><br>
        <input type="email" name="email" ><br>
        @error('email')
        <small>{{$message}}</small>
        @enderror
    </div><br>

    <input type="submit" class="btn" value="Заргестрироваться">
    <h3><a href="{{route('login')}}">Уже есть аккаунт?</a></h3>

</form>
</div>
</body>
</html>
