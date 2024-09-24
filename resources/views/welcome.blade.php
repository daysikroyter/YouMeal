<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouMeal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header class="header" style="background-image: url('{{ asset('images/header-bg.svg') }}')">
        <div class="container">
            <nav class="menu">
                <a href="/" class="logo">
                    <img src="{{ asset('images/logo.svg') }}" alt="логотип" class="logo__img">
                </a>
            </nav>
            <div class="header__content">
                <img src="{{ asset('images/header-burger.svg') }}" width="255" height="290" alt="бургер"
                    class="header__img">
                <div class="header__info">
                    <h1 class="header__title">
                        Только самые <span>сочные бургеры!</span>
                    </h1>
                    <p class="header__subtitle">
                        Бесплатная доставка от 599₽
                    </p>
                </div>
            </div>
        </div>
    </header>
</body>

</html>
