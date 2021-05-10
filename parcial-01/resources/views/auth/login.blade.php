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
        <a href="<?= url('/'); ?>" class="btn btn-dark m-3" role="button">
            <i class="bi bi-backspace"></i> Back to home page
        </a>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center m-3">
                <img src="" alt="" class="img-fluid">
                <h1>Sign-In</h1>
            </div>

            <div class="bg-form">
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted ">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning text-white btn-block">Log in</button>
                    <small><a href="#">Forgot your password?</a></small>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>


</body>

</html>