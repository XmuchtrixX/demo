<header class="header">
    <div class="header-container">
        <a href="{{ url('/applications') }}" class="logo">
            <div ><img src="{{ asset("logo.png") }}" width="100"></div>
            <div >Корочки.есть</div>
        </a>

        <nav class="nav">
            @auth
{{--                @if(Auth::user()->role === 'admin')--}}
{{--                    <a href="{{ route('admin.index') }}">Админ-панель</a>--}}
{{--                @endif--}}
                <a href="{{ route('applications.index') }}">Мои заявки</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="exit">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Авторизация</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </div>
</header><?php
