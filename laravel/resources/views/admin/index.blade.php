<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Admin page - Cidi Market')

@section('main')

    <div class="container p-4">
        <div class="row">
            <div class="col-12">
                <h2>Administrator panel</h2>
                <p class="text-secondary">Manage users, shipments and analyze the different site metrics</p>
            </div>
            <div class="col-12">
              <div class="d-flex gap-2 mb-4 justify-content-center">
                <div class="border rounded p-4 text-center">
                  <img src="<?= url('imgs/Panel_list.svg') ?>" alt="Login img" class="img-fluid img-login">
                  <h3>Shipping list</h3>
                  <p class="text-secondary">Manage site users. Edit names, passwords and permissions</p>
                  <a href="{{ url('admin/carts') }}" class="btn btn-warning">Carts list</a>
                </div>
                <div class="border rounded p-4 text-center">
                  <img src="<?= url('imgs/Panel_list.svg') ?>" alt="Login img" class="img-fluid img-login">
                  <h3>User list</h3>
                  <p class="text-secondary">Manage site users. Edit names, passwords and permissions</p>
                  <a href="{{ url('admin/users') }}" class="btn btn-warning">User list</a>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
