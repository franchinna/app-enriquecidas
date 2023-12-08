@extends('layouts.main')

@section('title', 'Register - Cidi Market')

@section('main')
    <div class="container">
        <div class="row justify-content-center mx-2">
            <div class="col-12 text-center">
                <img src="<?= url('imgs/login.svg') ?>" alt="Login img" class="img-fluid img-login">
                <h2>Sign-Up</h2>
                <p>Complete the form to start enjoying our offers</p>
            </div>

            <div class="col-12 bg-form rounded mb-4">
                <form action="{{ route('auth.register') }}" method="post" class="d-flex flex-wrap justify-content-center">
                    @csrf
                    <div class="form-group mb-2 col-12 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', '') }}"
                            @error('name') aria-describedby="error-name" @enderror>

                        @error('name')
                            <div class="invalid-feedback d-block" id="error-name">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group mb-2 col-12 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email', '') }}"
                            @error('email') aria-describedby="error-email" @enderror>

                        @error('email')
                            <div class="invalid-feedback d-block" id="error-email">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group mb-4 col-12 col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" value="{{ old('password', '') }}"
                            @error('password') aria-describedby="error-password" @enderror>

                        @error('password')
                            <div class="invalid-feedback d-block" id="error-password">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4 col-12 col-md-6">
                        <label for="password2" class="form-label">Repeat password</label>
                        <input type="password2" name="password2" id="password2"
                            class="form-control @error('password2') is-invalid @enderror" value="{{ old('password2', '') }}"
                            @error('password2') aria-describedby="error-password2" @enderror>

                        @error('password2')
                            <div class="invalid-feedback d-block" id="error-password2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-8 col-lg-4 text-center">

                        <button type="submit" class="btn btn-warning text-white btn-block">Create my account</button>
                        <small><a href="#">Forgot your password?</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
