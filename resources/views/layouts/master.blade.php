<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Car Service Dashboard</title>







    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Remove the slim version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Keep only one jQuery inclusion -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    <img src="{{ asset('website/assets/logo-o2pro-w.png') }}" class="w-20 h-20 fill-current text-gray-500" alt="Application Logo" style="width: 80px; height: 80px;" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">

                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ ('Login') }} </a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ ('Register') }}</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('users.index') }}"> إدارة المستخدمين <i class="fa-solid fa-users-gear"></i></a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">إدارة الصلاحيات  <i class="fa-solid fa-newspaper"></i></a></li>
                            <li><a class="nav-link" href="{{ route('branches.index') }}">إدارة الفروع <i class="fa-solid fa-location-pin"></i></a></li>
                            <li><a class="nav-link" href="{{ route('clients.index') }}">إدارة العملاء <i class="fa-solid fa-users"></i></a></li>
                            <li><a class="nav-link" href="{{ route('invoices.index') }}"> الفواتير <i class="fa-solid fa-file-invoice-dollar"></i></a></li>

                        </ul>
                        <ul class="navbar-nav">

                            <li class="ms-3 nav-item dropdown ml-left">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <main class="py-4 bg-light">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>






    <!-- Add these lines to your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>



