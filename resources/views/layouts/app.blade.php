<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="https://kit.fontawesome.com/59290932cf.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
        <nav id="nav" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a id="brand" class="navbar-brand" href="{{ url('/') }}">
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
                                <a class="nav-link text-white" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">登録</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/users/edit">
                                        プロフィール
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
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
    </div>
@auth
<div class="container">
    <div class="row">

        <div class="col-md-4 mt-4">

            <div class="list-group">
                <a href="#" id="list" class="list-group-item list-group-item-action text-white"><i class="fas fa-cog mr-1"></i>ダッシュボード</a>
                <a href="/users" class="list-group-item list-group-item-action"><i class="fas fa-user-cog mr-1"></i>ユーザー</a>
                <a href="/post" class="list-group-item list-group-item-action"><i class="fas fa-pencil-alt mr-1"></i>ポスト</a>
                <a href="/category" class="list-group-item list-group-item-action"><i class="fas fa-boxes mr-1"></i>カテゴリー</a>
                <a href="/tag" class="list-group-item list-group-item-action"><i class="fas fa-tag mr-1"></i>タグ</a>
                <a href="/trashed-posts" class="list-group-item list-group-item-action"><i class= "fas fa-trash-alt mr-1"></i>ゴミ箱</a>

            </div>

        </div>

        <div class="col-md-8 mt-4">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif

@endauth
        @yield('content')

        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>

<style>
    #list{
        background-color:#2EC4B6;
    }
    #nav{
        background-color:#2EC4B6;
    }
    #brand{
        color:white;
    }
    #head{
        background-color:#2EC4B6;
    }
    .btn-info{
        color:white;
    }
</style>
