<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Profile - Cidi Market')

@section('main')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h2>Basic information about you</h2>
                <p class="text-secondary">You will be able to change and track your orders</p>
            </div>
            <div class="col-12 col-lg-4">
                <div class="rounded border p-4 profile-box">
                        <h3 class="">Datos de perfil</h3>
                        
                    <ul class="list-group list-group-flush">
                        <li class="px-0 list-group-item">Username: <span
                                class="font-weight-bold">{{ auth()->user()->name ?? '' }}</span></li>
                        <li class="px-0 list-group-item">Mail: <span
                                class="font-weight-bold">{{ auth()->user()->email ?? '' }}</span></li>
                    </ul>
                    <a href="" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="alert alert-info text-center p-4" role="alert">
                    <h3>Your cart is empty</h3>
                    <p>Let's change that - use the app to discover
                        thousand of great deals</p>
                        <a href="{{ url('/') }}" class="btn btn-warning">Return to shop</a>
                </div>
                <div class="rounded border p-4">
                    <h3>Listado de pedidos realizados</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Order #</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">#9284</th>
                                <td>17/19/1992</td>
                                <td class=""><span class="badge badge-info">In Proces</span></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" title="Cancer order"
                                            class="btn btn-sm btn-outline-danger rounded mr-2">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#9283</th>
                                <td>17/19/1992</td>
                                <td class=""><span class="badge badge-success">Sent</span></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" title="Cancer order"
                                            class="btn btn-sm btn-outline-info rounded mr-2">Info</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#9286</th>
                                <td>17/19/1992</td>
                                <td class=""><span class="badge badge-danger">Cancel</span></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" title="Cancer order"
                                            class="btn btn-sm btn-outline-info rounded mr-2">Info</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
