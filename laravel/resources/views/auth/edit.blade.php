<?php
/** @var \Illuminate\Support\ViewErrorBag | \Illuminate\Support\View\MessageBag  $errors*/
/** @var \App\Models\User $user */
?>

@extends('layouts.main')

@section('title', 'Edit ' . $user->name . ' - Cidi Market')
@section('main')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <img src="<?= url('imgs/edit_user.svg') ?>" alt="Cute astronaut flying with pencil rocket cartoon"
                    width="200" class="img-fluid img-login">
                <h2>Update user</h2>
                <p>Please, complete the form to update.</p>
            </div>

            <div class="bg-form rounded border p-3 col col-lg-6">
                <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                            @error('name') aria-describedby="error-name" @enderror>
                        @error('name')
                            <div class="invalid-feedback d-block" id="error-name">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            @error('email') aria-describedby="emailHelp"  @enderror value="{{ old('email', $user->email) }}"
                            @error('email') aria-describedby="error-email" @enderror>
                        @error('email')
                            <div class="invalid-feedback d-block" id="error-email">{{ $message }}</div>
                        @enderror
                    </div>
                    @if (auth()->user()->rol == 1)
                        <div class="form-group mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <input type="text" name="rol" id="rol"
                                class="form-control @error('rol') is-invalid @enderror"
                                @error('rol') aria-describedby="rolHelp"  @enderror value="{{ old('rol', $user->rol) }}"
                                @error('rol') aria-describedby="error-rol" @enderror>
                            @error('rol')
                                <div class="invalid-feedback d-block" id="error-rol">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            @error('password') aria-describedby="passwordHelp"  @enderror
                            placeholder="Insert new password if you want"
                            @error('password') aria-describedby="error-password" @enderror>
                        @error('password')
                            <div class="invalid-feedback d-block" id="error-password">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning text-white float-right">
                        Update user
                    </button>

                </form>
                <form action="{{ route('users.delete', ['user' => $user->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger mr-2 float-right">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
