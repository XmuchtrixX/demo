<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявки - Корочки.есть</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
@include('header')

<div class="container">
    <h1>Формирование заявки</h1>

    <div class="content-container">
        @if ($errors->any())
            <div class="message message-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('applications.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Наименование курса</label>
                <select name="course" required>
                    <option value="">Выберите курс</option>
                    <option value="Основы алгоритмизации и программирования">Основы алгоритмизации и программирования</option>
                    <option value="Основы веб-дизайна">Основы веб-дизайна</option>
                    <option value="Основы проектирования баз данных">Основы проектирования баз данных</option>
                </select>
            </div>

            <div class="form-group">
                <label>Желаемая дата начала обучения</label>
                <input type="text"
                       name="ate"
                       placeholder="ДД.ММ.ГГГГ"
                       required>
            </div>

            <div class="form-group">
                <label >Способ оплаты</label>
                <select  name="pay" required>
                    <option value="">Выберите способ оплаты</option>
                    <option value="cash">Наличными</option>
                    <option value="phone">Перевод по номеру телефона</option>
                </select>
            </div>

            <button type="submit" class="btn">Отправить заявку</button>

            <a href="{{ route('applications.index') }}" class="back-link">Вернуться к списку заявок</a>
        </form>
    </div>
</div>

</body>
</html>
