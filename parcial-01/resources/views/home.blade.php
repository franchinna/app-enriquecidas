<?php

/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>
@extends('layouts.main')

@section('title', 'Home - Cidi Market')

@section('main')
<div class="container-fluid banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="py-5">Welcome to Cidi Market</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light py-5">
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
                                        <p class="card-text font-weight-bold">USD {{$cd->cost / 100 }}</p>
                                    </div>
                                </a>
                                <div class="card-footer">
                                    <a href="{{ url('add-to-cart/'. $cd->cd_id) }}" class="btn btn btn-warning text-white">
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
</div>


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
                <a role="button" class="btn btn-warning text-white" href="<?= url('/cds'); ?>">Go to Discographies</a>
            </div>
        </div>
    </div>
</div>-->

@endsection