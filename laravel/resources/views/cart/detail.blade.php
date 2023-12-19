<?php/** @var \App\Models\Cart[]|\Illuminate\Database\Eloquent\Collection $cart */?>

@extends('layouts.main')

@section('title', 'Detail order {{$cart}} - Cidi Market')

@section('main')

<div class="container-fluid py-2 my-2">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 bg-light p-5 rounded border">
                <h2 class="pb-4">Order list # {{$cart}}</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Album name</th>
                                <th scope="col" class="td-center">Quantity</th>
                                <th scope="col" class="td-center">Sub total</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <th scope="row">{{$item->cd->title}}</th>
                                    <td class="td-center">
                                        
                                        {{ $item->quantity }}
                                        
                                    </td>
                                    <td class="td-center"><span class="f-14">USD </span> {{ ($item->quantity * $item->cd->cost) / 100 }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th scope="row">Total:</th>
                                    <td></td>
                                    <td class="td-center font-weight-bold price"><span class="f-14">USD </span> {{{$totalPrice/100}}}</td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-12 p-0 m-0 text-center">

                    <a href="<?= url()->previous(); ?>" class="btn btn-light mr-2" role="button">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
