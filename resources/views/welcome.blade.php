<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div id="branch-id">
                    branch : b2
                </div>
                <div id="branch-changes">
                    <ul>
                        <li>b1 : Добавил свои надписи на вью welcome</li>
                        <li>b2 : Создал views.news</li>
                        <li>b3 : Точно не помню, что именно сделал.</li>
                        <li>b4 : Добавил новость на views.news.</li>
                    </ul>                    
                </div>

                <div class="links">
                    <a class="news" href="/news">Новости</a>
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>                    
                </div>
            </div>
        </div>
    </body>
</html>
