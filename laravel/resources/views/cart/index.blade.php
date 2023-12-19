<?php
/** @var \App\Models\Cart[]|\Illuminate\Database\Eloquent\Collection $cart */
?>

@extends('layouts.main')

@section('title', 'Cart - Cidi Market')

@if($cart)
    @push('js')
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
        // Inicializamos MP.
        const mp = new MercadoPago('{{config("services.mercadopago.key")}}', {
            locale: 'es-AR'
        });

        mp.checkout({
            preference: {
                // MUY IMPORTANTE: No se olviden de poner las comillas alrededor del php.
                id: '{{ $preference->id ?? ''}}'
            },
            render: {
                container: '#meli-button',
                label: 'Confirm & pay'
            },
        });
        </script>
    @endpush
@endif

@section('main')

    @if (!$cart)
        <div class="container-fluid py-5 my-5">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-6 text-center cart-empty h-100 rounded border">
                        <h2 class="m-4">Your cart is empty</h2>
                        <p>Let's change that - use the app to discover </br> thousand of great deals</p>
                        <a href="{{ url('/') }}" class="btn btn-warning">Return to shop</a>
                    </div>
                </div>
            </div>
        </div>
    @elseif($cart->user_id == null)
    <div class="container-fluid py-5 my-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-6 text-center cart-empty h-100 rounded border">
                    <h2 class="m-4">Sign ig</h2>
                    <p>You will be able to see your cart and many more things</p>
                    <a href="{{ url('/login') }}" class="btn btn-warning">Login</a>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container-fluid py-2 my-2">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 bg-light p-5 rounded border">
                        <h2 class="pb-4">Order list # {{$cart->id}}</h2>
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
                        <a href="{{ url('remove-to-cart/' . $item->cd_id) }}" class="m-2 p-2">-</a>
                        {{ $item->quantity }}
                        <a href="{{ url('add-to-cart/' . $item->cd_id) }}" class="m-2 p-2">+</a>
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
                            @guest()
                                <p class="py-3">If you want continue with <b>checkout</b>, please <a
                                        href="{{ route('auth.login-form') }}">login</a>
                                </p>
                            @endguest
                            @auth()
                            <a href="<?= url('/cds'); ?>" class="btn btn-light mr-2" role="button">
                                Continue purchasing
                            </a>   
                                <div  id="meli-button" class="d-inline-block"></div>
                                <a href="#" class="d-none btn btn-warning" data-toggle="modal" data-target="#cartConfirm">Check
                                    Out</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Modal -->
        <div class="modal fade" id="cartConfirm" tabindex="-1" aria-labelledby="cartConfirm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Confirm your order?</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <p style="font-size:4rem">
                                <img src="<?= url('imgs/email.svg') ?>" alt="" class="img-fluid w-50">
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-success" href="{{ route('cart.checkout', $cart->id) }}">Yes, confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    @endif

@endsection
