<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заявки</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
@include('header')

<div class="main-content">
    <h1>Мои заявки</h1>

    <div class="container">
        @if(session('success'))
            <div class="message message-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="message message-error">{{ session('error') }}</div>
        @endif



{{--        @if($applications->count() > 0)--}}
            <table>
                <thead>
                <tr>
                    <th>Курс</th>
                    <th>Дата начала</th>
                    <th>Оплата</th>
                    <th>Статус</th>
                    <th>Отзыв</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->course}}</td>
                        <td>{{ $application->date->format('d.m.Y') }}</td>
                        <td>
                            @if($application->payment_method == 'cash')
                                Наличными
                            @else
                                Перевод
                            @endif
                        </td>
                        <td>
                            @if($application->status == 'new')
                                <span>Новая</span>
                            @elseif($application->status == 'in_progress')
                                <span >Идет обучение</span>
                            @else
                                <span >Завершено</span>
                            @endif
                        </td>
                        <td>
                            @if($application->status == 'completed' && !$application->review)
                                <form action="{{ route('applications.review', $application->id) }}" method="POST">
                                    @csrf
                                    <textarea name="comment" placeholder="Оставить отзыв" rows="2"></textarea><br>
                                    <button type="submit">Отправить</button>
                                </form>
                            @elseif($application->review)
                                {{ Str::limit($application->review, 30) }}
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--        @else--}}
{{--            <p >Нет заявок</p>--}}
{{--        @endif--}}

        <a href="{{ route('applications.create') }}" >Создать заявку</a>
    </div>
</div>
</body>
</html>
