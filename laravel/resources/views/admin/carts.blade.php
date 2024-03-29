<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Admin carts - Cidi Market')

@section('main')

    <div class="container p-4">
        <div class="row">
            <div class="col-12">
                <h2>Administrator panel</h2>
                <p class="text-secondary">Manage users, shipments and analyze the different site metrics</p>
            </div>

            <div class="col-12">
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
                                        <th scope="col">User</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <th scope="row">#0{{ $cart->id }}</th>
                                            <td><span class="">{{ $cart->user->name ?? '' }}</span></td>
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
                            </table></div>
                        <div>{{ $carts->links() }}</div>
                    </div>
                @endif
            </div>

            <div class="col-12 col-lg-8">
                <div class="rounded p-4 border mb-3">
                    <h3>{{ $chart->options['chart_title'] }}</h3>
                    <p class="text-secondary f-14">List of pending, confirmed and rejected shipments</p>
                    {!! $chart->renderHtml() !!}
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="rounded p-4 border  mb-3">
                    <h3>{{ $chart2->options['chart_title'] }}</h3>
                    <p class="text-secondary f-14">List of pending, confirmed and rejected shipments</p>
                    {!! $chart2->renderHtml() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    {!! $chart->renderChartJsLibrary() !!}

    {!! $chart->renderJs() !!}
    {!! $chart2->renderJs() !!}
@endsection
