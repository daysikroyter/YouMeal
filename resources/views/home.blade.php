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
                <div class="header__img-box">
                    <img src="{{ asset('images/header-burger.svg') }}" width="255" height="230" alt="бургер"
                        class="header__img">
                    <img src="{{ asset('images/burger-shadow.svg') }}" alt="тень" width="210" height="25"
                        class="header__circle">
                </div>
                <div class="header__info">
                    <h1 class="header__title">
                        Только самые <span class="animated-text">сочные бургеры!</span>
                    </h1>
                    <p class="header__subtitle">
                        Бесплатная доставка от 599₽
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section class="categories">
        <div class="container">
            <ul class="categories__tabs tabs">
                @foreach ($categories as $index => $category)
                    <li class="categories__tab-item">
                        <a href="categories-tab-{{ $index + 1 }}"
                            class="categories__tab tab {{ $index === 0 ? 'tab--active' : '' }}">
                            <div class="categories__tab-icon">
                                <img src="{{ asset($category->image_path) }}" width="24" height="24"
                                    alt="{{ $category->title }}">
                            </div>
                            <span>{{ $category->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="categories__content">
                <div class="categories__cart">
                    <div class="categories__cart-top">
                        <p class="categories__cart-title">
                            Корзина
                        </p>
                        <span class="categories__cart-count">0</span>
                    </div>
                    <p class="categories__cart-empty">
                        Тут пока пусто :(
                    </p>
                </div>
                <ul class="categories__list tabs-container">
                    <li class="categories__item tabs-content tabs-content--active" id="categories-tab-1">
                        @if ($categories->isNotEmpty())
                            <h2 class="categories__title">{{ $categories->first()->title }}</h2>
                        @else
                            <h2 class="categories__title">Категории не найдены</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($burgers as $burger)
                                <li class="categories__elem">
                                    <img src="{{ asset($burger->image_path) }}" alt="{{ $burger->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $burger->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $burger->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $burger->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $burger->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($burger->image_path) }}" width="276" height="220"
                                                alt="{{ $burger->title }}" class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $burger->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $burger->weight }}г, ккал {{ $burger->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $burger->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-2">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[1]->title }}</h2>
                        @else
                            <h2 class="categories__title">Вторая категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($snacks as $snack)
                                <li class="categories__elem">
                                    <img src="{{ asset($snack->image_path) }}" alt="{{ $snack->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $snack->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $snack->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $snack->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $snack->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($snack->image_path) }}" width="276" height="220"
                                                alt="{{ $snack->title }}" class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $snack->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $snack->weight }}г, ккал {{ $snack->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $snack->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-3">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[2]->title }}</h2>
                        @else
                            <h2 class="categories__title">Третья категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($hotdogs as $hotdog)
                                <li class="categories__elem">
                                    <img src="{{ asset($hotdog->image_path) }}" alt="{{ $hotdog->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $hotdog->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $hotdog->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $hotdog->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $hotdog->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($hotdog->image_path) }}" width="276"
                                                height="220" alt="{{ $hotdog->title }}"
                                                class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $hotdog->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $hotdog->weight }}г, ккал {{ $hotdog->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $hotdog->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-4">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[3]->title }}</h2>
                        @else
                            <h2 class="categories__title">Четвертая категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($combos as $combo)
                                <li class="categories__elem">
                                    <img src="{{ asset($combo->image_path) }}" alt="{{ $combo->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $combo->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $combo->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $combo->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $combo->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($combo->image_path) }}" width="276" height="220"
                                                alt="{{ $combo->title }}" class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $combo->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $combo->weight }}г, ккал {{ $combo->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $combo->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-5">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[4]->title }}</h2>
                        @else
                            <h2 class="categories__title">Пятая категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($shawarmas as $shawarma)
                                <li class="categories__elem">
                                    <img src="{{ asset($shawarma->image_path) }}" alt="{{ $shawarma->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $shawarma->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $shawarma->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $shawarma->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $shawarma->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($shawarma->image_path) }}" width="276"
                                                height="220" alt="{{ $shawarma->title }}"
                                                class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $shawarma->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $shawarma->weight }}г, ккал {{ $shawarma->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $shawarma->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-6">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[5]->title }}</h2>
                        @else
                            <h2 class="categories__title">Шестая категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($pizzas as $pizza)
                                <li class="categories__elem">
                                    <img src="{{ asset($pizza->image_path) }}" alt="{{ $pizza->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $pizza->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $pizza->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $pizza->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $pizza->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($pizza->image_path) }}" width="276" height="220"
                                                alt="{{ $pizza->title }}" class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $pizza->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $pizza->weight }}г, ккал {{ $pizza->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $pizza->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-7">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[6]->title }}</h2>
                        @else
                            <h2 class="categories__title">Седьмая категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($woks as $wok)
                                <li class="categories__elem">
                                    <img src="{{ asset($wok->image_path) }}" alt="{{ $wok->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $wok->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $wok->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $wok->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $wok->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($wok->image_path) }}" width="276" height="220"
                                                alt="{{ $wok->title }}" class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $wok->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $wok->weight }}г, ккал {{ $wok->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $wok->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-8">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[7]->title }}</h2>
                        @else
                            <h2 class="categories__title">Восьмая категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($desserts as $dessert)
                                <li class="categories__elem">
                                    <img src="{{ asset($dessert->image_path) }}" alt="{{ $dessert->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $dessert->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $dessert->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $dessert->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $dessert->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($dessert->image_path) }}" width="276"
                                                height="220" alt="{{ $dessert->title }}"
                                                class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $dessert->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $dessert->weight }}г, ккал {{ $dessert->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $dessert->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="categories__item tabs-content" id="categories-tab-9">
                        @if ($categories->count() > 1)
                            <h2 class="categories__title">{{ $categories[8]->title }}</h2>
                        @else
                            <h2 class="categories__title">Девятая категория не найдена</h2>
                        @endif
                        <ul class="categories__elements">
                            @foreach ($sauces as $sauce)
                                <li class="categories__elem">
                                    <img src="{{ asset($sauce->image_path) }}" alt="{{ $sauce->title }}"
                                        class="categories__elem-img">
                                    <span class="categories__elem-price">
                                        {{ $sauce->price }}₽
                                    </span>
                                    <h3 class="categories__elem-title link">
                                        {{ $sauce->title }}
                                    </h3>
                                    <span class="categories__elem-weight">
                                        {{ $sauce->weight }}г
                                    </span>
                                    <button class="categories__elem-btn" type="button">
                                        Добавить
                                    </button>
                                    <div class="categories__popup">
                                        <h4 class="categories__popup-title">
                                            {{ $sauce->title }}
                                        </h4>
                                        <div class="categories__popup-info">
                                            <img src="{{ asset($sauce->image_path) }}" width="276"
                                                height="220" alt="{{ $sauce->title }}"
                                                class="categories__popup-img">
                                            <div class="categories__popup-descr">
                                                <p class="categories__popup-text">
                                                    {{ $sauce->description }}
                                                </p>
                                                <span class="categories__popup-composition">
                                                    Состав:
                                                </span>
                                                <ul class="categories__popup-list">
                                                    <li class="categories__popup-item">
                                                        Пшеничная булочка
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Котлета из говядины
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Красный лук
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Листья салата
                                                    </li>
                                                    <li class="categories__popup-item">
                                                        Соус горчичный
                                                    </li>
                                                </ul>
                                                <span class="categories__popup-weight">
                                                    {{ $sauce->weight }}г, ккал {{ $sauce->calories }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="categories__popup-actions">
                                            <button class="categories__popup-btn">
                                                Добавить
                                            </button>
                                            <div class="input-field" min="1" max="10" step="1"
                                                value="">
                                                <button class="input-field__button minus" type="button">
                                                    -
                                                    <span class="sr-only">уменьшить количество товара</span>
                                                </button>
                                                <div class="input-field__number-value">
                                                    <span class="input-field__number">1</span>
                                                </div>
                                                <button class="input-field__button plus" type="button">
                                                    +
                                                    <span class="sr-only">увеличить количество товара</span>
                                                </button>
                                            </div>
                                            <span class="categories__popup-price">
                                                {{ $sauce->price }}₽
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>

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
                            <img src="{{ asset('images/phone-ico.svg') }}" width="24" height="24"
                                alt="телефон">
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

</html>
