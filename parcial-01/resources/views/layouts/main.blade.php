<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Parcial 01 - App Enriquecidas')</title>
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= url('css/estilos.css');?>">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Cidi Market</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= url()->current() == url('/') ? 'active' : '';?>" href="<?= url('/');?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= url()->current() == url('/cds') ? 'active' : '';?>" href="<?= url('/cds');?>">Discographies</a>
                </li>
{{--            @if(auth()->guest())--}}
            @guest()
                <li class="nav-item">
                    <a class="nav-link <?= url()->current() == url('/login') ? 'active' : '';?>" href="<?= url('/login');?>">Login</a>
                </li>
            @endguest
{{--            @else--}}
            @auth()
                <li class="nav-item">
                    <a class="nav-link <?= url()->current() == url('/logout') ? 'active' : '';?>" href="<?= url('/logout');?>">Logout</a>
                </li>
{{--            @endif--}}
            @endauth
            </ul>
        </div>
    </nav>


    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') ?? 'success' }}">{{ Session::get('message') }}</div>
    @endif

    @yield('main')

    <div class="footer mt-5">
        <p>Copyright &copy; Da Vinci 2021</p>
    </div>
</body>
</html>
