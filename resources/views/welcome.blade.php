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

    

    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <a class="logo footer__logo" href="/">
                    <img class="logo__img" src="{{ asset('images/footer-logo.svg') }}" alt="логотип">
                </a>
                <div class="footer__phone">
                    <p class="footer__title">
                        Номер для заказа
                    </p>
                    <div class="footer__phone-link">
                        <div class="footer__phone-icon">
                            <img src="{{ asset('images/phone-ico.svg') }}" width="24" height="24" alt="телефон">
                        </div>
                        <a href="tel:+79308333811" class="link">+7(930)833-38-11</a>
                    </div>
                </div>
                <div class="footer__social">
                    <p class="footer__title">
                        Мы в соцсетях
                    </p>
                    <ul class="footer__social-items">
                        <li class="footer__item">
                            <a href="#" class="footer__link">
                                <img src="{{ asset('images/vk.svg') }}" alt="вк" class="footer__img">
                            </a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">
                                <img src="{{ asset('images/telegram.svg') }}" alt="телеграмм" class="footer__img">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer__bottom">
                <p class="footer__copyright">
                    © YouMeal, 2022
                </p>
                <p class="footer__design">
                    Design:
                    <a class="footer__author link" href="#">Anastasia Ilina</a>
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
