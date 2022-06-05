<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>

    <title>Deal.in</title>
</head>
<body>

{{--navbar--}}
<div class="navbar">
    <div class="left">
        <a style="display: flex" href="{{ route('home') }}">
            <p> <img style="width: 25px; transform: translateY(5px)"
                    src="/dealin.png" align="left">eal.in </p>
        </a>
    </div>

    <div class="right">
        <div class="search">
            <form class="group relative" action="{{ route('search') }}">
                <input type="text" name="cari" placeholder="Cari barang di sini..">
            </form>
        </div>

        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">
                <div class="user">
                    <x-forkawesome-user-circle-o class="w-7 h-7 mt-1"/>
                </div>
                <div class="user">
                    <x-grommet-down class="w-4 h-4  mb-2"/>
                </div>
            </button>
            @if (Auth::check())
                <div id="myDropdown" class="dropdown-content">
                    <form method="POST" action="{{ route('mine') }}">
                        @csrf

                        <x-dropdown-link :href="route('mine')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Iklan Saya') }}
                        </x-dropdown-link>
                    </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Keluar') }}
                        </x-dropdown-link>
                    </form>
                </div>
            @else
                <div id="myDropdown" class="dropdown-content">
                    <form method="GET" action="{{ route('login') }}">
                        @csrf

                        <x-dropdown-link :href="route('login')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log in') }}
                        </x-dropdown-link>
                    </form>
                </div>
            @endif
        </div>
        <a href="{{ route('create-form') }}" class="buttonjual">PASANG IKLAN</a>
    </div>
</div>


<div class="sidenav">
    <div class="sidemenu">
        <a href="{{ route('home') }}" class=" {{(request()->is('/'))? 'active' : ''}} ">

            <div class="icon">
                <x-ri-dashboard-fill class="h-6 w-6"/>
            </div>
            <div class="icon">
                <p class="text-align-vert">Dashboard</p>
            </div>
        </a>

        <a href="{{ route('mine') }}" class="{{(request()->is('dealins/mine'))? 'active' : ''}}">
            <div class="icon">
                <x-ri-article-fill class="h-6 w-6"/>
            </div>
            <div class="icon">
                <p class="text-align-vert"> Iklan Saya </p>
            </div>
        </a>

        <a href="{{ route('riwayat') }}" class="{{(request()->is('dealins/riwayat'))? 'active' : ''}}">
            <div class="icon">
                <x-ri-history-fill class="h-6 w-6"/>
            </div>
            <div class="icon">
                <p class="text-align-vert"> Riwayat </p>
            </div>
        </a>
        <a href="{{ route('profile') }}" class="{{(request()->is('profile'))? 'active' : ''}}">
            <div class="icon">
                <x-ri-profile-fill class="h-6 w-6"/>
            </div>
            <div class="icon">
                <p class="text-align-vert"> Profil </p>
            </div>
        </a>
    </div>
    @if (Auth::check())
        @if(request()->is('/'))
        <div class="box">
            <h2>Halo, {{strtok(Auth::user()->name, " ")}} !</h2>
            <p>Jual barang dagangan-mu dengan cepat sampai deal. Mudah dan gratis !</p>
            <div class="span">
                <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>Tutup</span>
            </div>
            <a style="font-weight: bold" href="{{ route('create-form') }}" class="box-register">Jual</a>
        </div>
        @endif
    @else
        @if(request()->is('/'))
    <div class="box">
        <h2>Yuk, mulai jualan !</h2>
        <p>Jual barang dagangan-mu dengan cepat sampai deal. Mudah dan gratis !</p>
        <div class="span">
        <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>Tutup</span>
        </div>
        <a href="{{ route('register') }}" class="box-register" >Daftar</a>
    </div>
    @endif
    @endif
    <div  class="line">
    <a class="setting" href="{{ route('pengaturan') }}" class="{{(request()->is('/pengaturan'))? 'active' : ''}}">
        <div class="icon">
            <x-ri-settings-3-fill class="h-6 w-6"/>
        </div>
        <div class="icon">
            <p class="text-align-vert"> Pengaturan </p>
        </div>
    </a>
    </div>
</div>
