<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main_menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media-queries.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
<header id="header">
<div class="focused"></div>
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="contact-info col-11 ">
                    <ul class="nav nav-pills">
                        <li class="yan" >Бесплатная доставка по предоплате от 1000 грн</li>

                    </ul>
                </div>
                <div class="social-info">
                    <ul class="nav navbar-flex ">
                        <li ><a href="https://Facebook.com" class="fa fa-facebook"></a></li>
                        <li ><a href="https://instagram.com/drink.king.ua" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--Контактная информа-->

    <div class="navbar navbar-inverse navbar-fixed-top pc">


<div class="navbar_header ">
<div class="row">

            <a href="/" class="navbar-brand">
                <img class="lazy" src="/Templates/images/3.svg" alt="" class="">
            </a>



                <div class="modal fade" id="exampleModalLong_pc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Оплата и доставка</h5>
                                <button type="button " class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <H4>Оплата за товар производится:</H4>
                                <h6>- Перечислением на банковскую карту (номер и сумму отправляем смс сообщением)</h6>
                                <h6>- Наложенным платежом при предоплате 50 грн.</h6>
                                Срок отправки товара с момента совершения заказа – до 3х дней.
                                Стоимость отправки зависит от тарифов перевозчика (Новая почта, Интайм).
                                Обработка заказов – каждый день с 09.00 до 21.00
                                Если Вы не нашли из нашего ассортимента то, что Вас интересовало, свяжитесь с нами по номеру (+380)970017701
                                <H4>Прочее</H4>
                                Вся продукция сертифицирована и имеет документальное подтверждение в виде сертификата соответствия (отправляется вместе с товаром по просьбе заказчика).
                                В соответствии с законодательством Украины в сфере алкогольной продукции, если алкогольный напиток крепостью до 8,5%, то он не подлежит акцизному маркированию.
                                Вся импортная продукция разливается не на территории Украины.
                                Этикетки, которые находятся на задней части бутылки (в некоторых случаях все этикетки на бутылке) заказываются компанией импортером и вместе с акцизными марками отправляются на завод изготовитель для последующей маркировки.
                                <H4>....</H4>
                                При предоставлении персональных данных на Сайте Магазина, Клиент дает свое добровольное согласие на обработку и использование (в том числе и передачу) своих персональных данных без ограничения срока действия такого согласия в соответствии с Законом Украины «О защите персональных данных» от 01.06.2010 г.
                                Cайт Магазина вправе использовать персональные данные Клиента для оказания определенных настоящим договором услуг, в том числе и при помощи автоматизированной обработки персональных данных.
                                Cайт Магазина берет на себя обязанность не разглашать персональные и контактные данные полученные от Клиента.
                                Клиент несет ответственность за несоответствие своих персональных данных действительности.
                                Cайт Магазина не несет ответственности за несоответствие персональных данных Клиента.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d7">

<form id="form" action = "#" method = "GET">

<div class="row">
      <div class="search ">
                   <input type="text" name="s_search5" autocomplete="off" placeholder="Поиск по сайту..." >

</div>
<div class="input_search ">
<input id="search_submit" type = "submit" name = "submit" value="" title="Поиск">
</div>
</div>
           </form >




                </div>
<div class="auth noAuth topNavBlock">
                     @guest   <p>@if (Route::has('register'))<a href="{{ route('register') }}">Регистрация</a> |@endif<a href="{{ route('login') }}">Вход</a></p>@else<p><a href="#">{{ Auth::user()->name }}</a> | <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Выход</a></p> @endguest
                  <div class="modal_button">      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong_pc"><span>Оплата и Доставка

                    </span></button></div>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                    </div>

                    <div class="mainTel topNavBlock">
<p><a href="tel:+380 97 001 77 01" >Онлайн маркет</a></p>
<span class="number-1">(097)0017701</span></div>
<div class="fullListTell">
<div class="forScroll" style="max-height: 182px;">
<p class="h2">интернет-магазин</p>
<div class="infoTelBlock clearfix">
<div class="left">
<div>
<p><span style="text-decoration: underline;"><span style="color: #000000;"><a href="#"><span style="color: #000000; text-decoration: underline;">DRINK KING</span></a></span></span></p>
<p><span class="number-2">(097) 001 77 01</span></p>
</div>
</div>
<div class="right">
<div>
<p><span>Пн.-Пт.</span> 9:00-21:00</p>
<p><span>Сб.</span> 10:00-18:00</p>
</div>
</div>
</div>
</div>



                <!-- Button trigger modal -->


                <!-- Modal -->

            </div><!--меню,скорее всего не нужное-->
<div class="cartTopBlock">
 <a href="#" class="cartLink topNavBlock">
 <p id="cart-count" class="mobile-hidden">Корзина: 0</p>
 <span class="mobile-hidden">0<span>грн</span></span>
 </a>
</div>

   </div>
</div>
            </div><!--Корзина и авторизация-->
        </div>

    <div class="container">
        <div class="journal-menu">
            <ul class="super-menu mobile-menu menu-floated">

                <li class="drop-down  float-left main-menu-item-1">
                    <a href="/category/1"  ><span class="main-menu-text">Абсент</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-2">
                    <a href="/category/2" rel="nofollow"><span class="main-menu-text">Бренди</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-3">
                    <a href="/category/3" rel="nofollow"><span class="main-menu-text">Вермут</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-4">
                    <a href="/wine/" rel="nofollow"><span class="main-menu-text">Вино</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-5">
                    <a href="/category/5" rel="nofollow"><span class="main-menu-text">Виски</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-6">
                    <a href="/category/6" rel="nofollow"><span class="main-menu-text">Водка</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-7">
                    <a href="/category/7" rel="nofollow"><span class="main-menu-text">Джин</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-8">
                    <a href="/category/8" rel="nofollow"><span class="main-menu-text">Кальвадос</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-9">
                    <a href="/category/9" rel="nofollow"><span class="main-menu-text">Коньяк</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-10">
                    <a href="/category/10" rel="nofollow"><span class="main-menu-text">Ликер</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-11">
                    <a href="/category/11" rel="nofollow"><span class="main-menu-text">Ром</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-12">
                    <a href="/category/12" rel="nofollow"><span class="main-menu-text">Текила</span></a>
                    <span class="mobile-plus">+</span>
                </li>
                <li class="drop-down  float-left main-menu-item-13">
                    <a href="/category/13" rel="nofollow"><span class="main-menu-text">Игристое</span></a>
                    <span class="mobile-plus">+</span>
                </li>

            </ul>
        </div><!--Главное меню Алкоголя-->
    </div>

</div>

</header>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
