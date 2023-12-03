@extends('layouts.main')

@section('title', 'Login - Cidi Market')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <img src="<?= url('imgs/login.svg') ?>" alt="Login img" class="img-fluid img-login">
                <h1>Sign-In</h1>
            </div>

            <div class="bg-form rounded border py-3 px-4">
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email', '') }}"
                            @error('email') aria-describedby="error-email" @enderror>

                        @error('email')
                            <div class="invalid-feedback d-block" id="error-email">{{ $message }}</div>
                        @enderror

                        <small id="emailHelp" class="form-text text-muted @error('email') d-none @enderror">
                            We'll never share your email with anyone else.
                        </small>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" value="{{ old('password', '') }}"
                            @error('password') aria-describedby="error-password" @enderror>

                        @error('password')
                            <div class="invalid-feedback d-block" id="error-password">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning text-white btn-block mb-2">Log in</button>
                    <a href="<?= url('/forget-my-password') ?>"><small>Forgot your password?</small></a>
                    or <a href="<?= url('/register') ?>"><small>I want to register</small></a>
                </form>
            </div>
        </div>
    </div>
@endsection