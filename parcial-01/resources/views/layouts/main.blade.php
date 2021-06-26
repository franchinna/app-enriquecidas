<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Parcial 01 - App Enriquecidas')</title>
    <link rel="shortcut icon" href="<?=url('icons/ico.ico');?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= url('css/estilos.css'); ?>">
</head>

<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cidi Market</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= url()->current() == url('/') ? 'active' : ''; ?>" href="<?= url('/'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= url()->current() == url('/cds') ? 'active' : ''; ?>" href="<?= url('/cds'); ?>">Discographies</a>
                        </li>
                        
                        @guest()
                        <li class="nav-item">
                            <a class="nav-link <?= url()->current() == url('/login') ? 'active' : ''; ?>" href="<?= url('/login'); ?>">Login</a>
                        </li>
                        @endguest
                        @auth()
                        <li class="nav-item">
                            <a class="nav-link <?= url()->current() == url('/logout') ? 'active' : ''; ?>" href="<?= url('/logout'); ?>">Logout <i class="ml-2 bi bi-box-arrow-right"></i></a>
                        </li>
                        @endauth
                    </ul>

                    <div class="<?= url()->current() == url('/cds') ? 'd-block ml-lg-2' : 'd-none'; ?>">
                        <form class="d-flex my-2 my-lg-0" action="{{ route('cds.index') }}" method="GET">
                            <label for="title" class=" d-none">Title</label>
                            <input class="form-control me-2 mr-2" id="title" type="search" name="title" placeholder="CD name" aria-label="Search" value="{{ $formParams['title'] ?? null }}">
                            <button class="btn btn-outline-warning" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="ml-2">
                        <a href="" class="btn btn-outline-light">
                            <i class="bi bi-basket"></i>
                        </a>
                    </div>

                </div>
            </div>
        </nav>

        @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') ?? 'success' }}">{{ Session::get('message') }}</div>
        @endif

    </header>

    <main class="">

        @yield('main')
    </main>

    <footer>
        <div class="footer">
            <p>Copyright &copy; Franco Cinnante</p>
            <p>Aplicaciones Enriquecidas 2021 🥑</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    $( document ).ready(function() {
        $('#exampleModalCenter').modal('toggle')
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


</script>

</body>

</html>