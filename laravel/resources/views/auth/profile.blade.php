<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Profile - Cidi Market')

@section('main')
    <div class="container py-4">
        <div class="row gap-2">
            <div class="col-12 p-lg-0">
                <h2>Basic information about you</h2>
                <p class="text-secondary">You will be able to change and track your orders</p>
            </div>
            <div class="col-12 col-lg-4 p-lg-0">
                <div class="rounded border p-4 profile-box">
                    <h3 class="">Datos de perfil</h3>

                    <ul class="list-group list-group-flush">
                        <li class="px-0 list-group-item">Username: <span
                                class="font-weight-bold">{{ auth()->user()->name ?? '' }}</span></li>
                        <li class="px-0 list-group-item">Mail: <span
                                class="font-weight-bold">{{ auth()->user()->email ?? '' }}</span></li>
                        <li class="px-0 list-group-item">Rol: <span class="font-weight-bold">
                                @if (auth()->user()->rol_id == 1)
                                    <span class="badge badge-pill badge-secondary">admin</span>
                                @else
                                    <span class="badge badge-pill badge-secondary">Normal people</span>
                                @endif
                            </span></li>
                    </ul>
                    <a href="{{ route('users.editForm', ['user' => auth()->user()->id]) }}" type="button" title="Edit"
                        class="btn btn-sm btn-light">
                        <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg p-lg-0">
                @if ($carts->isEmpty())
                    <div class="alert alert-info text-center p-4" role="alert">
                        <h3>Your cart is empty</h3>
                        <p>Let's change that - use the app to discover
                            thousand of great deals</p>
                        <a href="{{ url('/') }}" class="btn btn-warning">Return to shop</a>
                    </div>
                @else
                    <div class="orders-list rounded p-4 border mb-3">
                        <h3>Orders List</h3>
                        <p class="text-secondary">List of pending, confirmed and rejected shipments</p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <th scope="row">#0{{ $cart->id }}</th>
                                            <td><span class="">{{ $cart->created_at }}</span></td>
                                            <td>   
                                                @if ($cart->status === 'Finished')
                                                    <span class="badge badge-light">{{ $cart->status }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ $cart->status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('cart.detail', ['cart' => $cart->id]) }}" title="Confirm order"
                                                        class="btn btn-sm btn-warning rounded">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div>{{ $carts->links() }}</div>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
