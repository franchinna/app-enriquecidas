<?php
/** @var \App\Models\Cart[]|\Illuminate\Database\Eloquent\Collection $cart */
?>

@extends('layouts.main')

@section('title', 'Cart - Cidi Market')

@section('main')

    <div class="container-fluid bg-light py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h1 class="pb-4">Shopping cart <i class="bi bi-basket text-warning"></i></h1>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="td-center">Item ID</th>
                                <th scope="col">CD Title</th>
                                <th scope="col" class="td-center">Quantity</th>
                                <th scope="col" class="td-center">Sub total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <th scope="row" class="td-center">{{ $item->cd_id }}</th>
                                    <td>{{ $item->cd->title }}</td>
                                    <td class="td-center">
                                        <a href="" class="m-2 p-2">+</a>
                                        {{ $item->quantity }}
                                        <a href="" class="m-2 p-2">-</a>

                                    </td>
                                    <td class="td-center">USD {{ ($item->quantity * $item->cd->cost) / 100 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
