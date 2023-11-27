<?php

/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>
@extends('layouts.main')

@section('title', 'Home - Cidi Market')

@section('main')
<section class="container-fluid banner">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col col-lg-6">
                <h1 class="mt-5">Bring Your Music Collection to Life: Buy CDs from All Your Favorite Artists</h1>
                <p class="subtitle">Get Your Groove On: Browse <b>Our Extensive Collection</b> of CDs from Popular Artists and Bands</p>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="card-group">
                <div class="row">
                    @foreach($cds as $cd)
                        <div class="col-sm-4 col-lg-3 mb-4">
                            <div class="card">
                                <a href="{{route('cds.view', ['cd' => $cd->cd_id])}}">
                                    <img src="<?= url('imgs/image-square.png')?>" alt="" class="img-fluid p-2">
                                    <div class="card-body">
                                        <h2 class="card-title">{{$cd->title}}</h2>
                                        <p class="p-0 m-0 f-14">{{$cd->artist->name}}</p>
                                    </div>
                                </a>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <p class="card-text m-0 p-0"><span class="small">usd</span> {{$cd->cost / 100 }}</p>
                                    <a href="{{ url('add-to-cart/'. $cd->cd_id) }}" class="btn btn btn-warning">
                                        <i class="bi bi-basket"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ++ Modal Under Construction ++ -->
<!--
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Page under construction</h5>
            </div>
            <div class="modal-body">
                <img src="<?= url('imgs/under_construction.svg'); ?>" alt="" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a role="button" class="btn btn-warning" href="<?= url('/cds'); ?>">Go to Discographies</a>
            </div>
        </div>
    </div>
</div>-->

@endsection