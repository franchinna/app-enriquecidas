<?php
/** @var \Illuminate\Support\ViewErrorBag | \Illuminate\Support\View\MessageBag  $errors*/
/** @var \App\Models\User $user */
?>

@extends('layouts.main')

@section('title', 'Edit your data - Cidi Market')
@section('main')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <img src="<?= url('imgs/edit_user.svg') ?>" alt="Cute astronaut flying with pencil rocket cartoon"
                    width="200" class="img-fluid img-login">
                <h2>Update user</h2>
                <p>Please, complete the form to update.</p>
            </div>

            <div class="bg-form rounded border p-3 col-12">
                <form action="{{ route('admin.edit', ['user' => $user->id]) }}" method="post">
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
                    @if (auth()->user()->rol_id == 1)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">User privileges</label>
                        </div>
                        <select class="custom-select" name="rol_id" id="rol_id" @error('rol_id') is-invalid @enderror"  @error('rol_id') aria-describedby="error-rols" @enderror >
                            <option value="{{$user->rol_id}}">{{$user->rol_name}}</option>
                            @foreach($rols as $rol)
                                @if($rol->rol_id != $user->rol_id){
                                    <option value="{{$rol->rol_id}}" @if(old('rol_id') == $rol->rol_id) selected @endif>{{$rol->name}}</option>
                                }
                                @endif
                            @endforeach
                        </select>
                        @error('rol_id')<div class="invalid-feedback d-block" id="error-rols">{{$message}}</div>@enderror
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

                    <div class="form-group mb-3 text-right">
    
                        <a href="<?= url('/admin'); ?>" class="btn btn-light mr-2" role="button">
                            Go back
                        </a>
                        <button type="submit" class="btn btn-warning text-white">
                            Update user
                        </button>
                    </div>



                </form>
            </div>
            <div class=" col-12 bg-form my-2">
                @if($user->available !== 'N')
                <div class="d-flex justify-content-between align-items-center alert alert-warning my-3" role="alert">
                    <label for="password" class="form-label mb-0 mr-2">Do you want delete your user?</label> 
                    <form action="{{ route('admin.delete', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            yes, delete
                        </button>
                    </form>
                </div>
                @else                
                <div class="d-flex justify-content-between align-items-center alert alert-success my-3" role="alert">
                    <label for="password" class="form-label mb-0 mr-2">Do you want delete your user?</label> 
                    <form action="{{ route('admin.activate', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('post')
                        <button class="btn btn-sm btn-success">
                            Activate user
                        </button>
                    </form>
                </div>

                @endif
            </div>
        </div>
    </div>

@endsection
