<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="{{'app.css'}}">

</head>
<body>
@include('header')


<div class="container">
    <h1>Авторизация</h1>

    <div class="form-container">
        <form action="{{ route('login') }}" method="POST">
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

            <button type="submit" class="btn">Войти</button>

            <div class="register-link">
                <p>Еще не зарегистрирован? <a href="{{ route('register') }}">Регистрация</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
