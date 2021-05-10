<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Parcial 01 - App Enriquecidas')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= url('css/estilos.css'); ?>">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <a class="navbar-brand" href="#">Cidi Market</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= url()->current() == url('/') ? 'active' : ''; ?>" href="<?= url('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url()->current() == url('/cds') ? 'active' : ''; ?>" href="<?= url('/cds'); ?>">Discographies</a>
                    </li>
                    {{-- @if(auth()->guest())--}}
                    @guest()
                    <li class="nav-item">
                        <a class="nav-link <?= url()->current() == url('/login') ? 'active' : ''; ?>" href="<?= url('/login'); ?>">Login</a>
                    </li>
                    @endguest
                    {{-- @else--}}
                    @auth()
                    <li class="nav-item">
                        <a class="nav-link <?= url()->current() == url('/logout') ? 'active' : ''; ?>" href="<?= url('/logout'); ?>">Logout</a>
                    </li>
                    {{-- @endif--}}
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <main class="">
        @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') ?? 'success' }}">{{ Session::get('message') }}</div>
        @endif

        @yield('main')
    </main>

    <footer>
        <div class="footer mt-5">
            <p>Copyright &copy; Da Vinci 2021</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    $( document ).ready(function() {
        $('#exampleModalCenter').modal('toggle')
    });
</script>

</body>

</html>