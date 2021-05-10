<?php

/** @var \App\Models\Cd[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Discographies list - Cidi Market')

@section('main')

<div class="container d-flex mt-50 mb-50">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1>Discographies List</h1>
            <p>Discographies</p>
        </div>
        <div class="col-md-3 text-center add-cd my-mb-0 my-mb-0 my-2">
            <a class="btn btn-light" href="<?= url('/cds/new'); ?>" role="button">
                <i class="bi bi-plus-circle-dotted mr-2"></i>Add a new CD to the list
            </a>
        </div>
        @foreach($cds as $cd)
        <div class="col-md-10 mb-3">
            <div class="card card-body">
                <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                    <div class="mr-2 mb-3 mb-lg-0">
                        <img src="<?= url('imgs/image.svg'); ?>" width="150" height="150" alt="">
                    </div>

                    <div class="media-body">
                        <h2 class="media-title font-weight-semibold">
                            <a href="{{route('cds.view', ['cd' => $cd->cd_id])}}" data-abc="true">{{$cd->title}}</a>
                        </h2>
                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Genero</a></li>
                        </ul>
                        <p class="mb-3">{{Str::limit($cd->description, 150)}}</p>
                        <ul class="list-inline list-inline-dotted mb-0">
                            <li class="list-inline-item">Release date: <a href="#" data-abc="true">{{$cd->release_date}}</a></li>
                        </ul>
                    </div>

                    <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                        <h3 class="mb-0 font-weight-semibold">usd {{$cd->cost / 100}}</h3>
                        <div>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="text-muted">Duration {{$cd->duration}} min</div>

                        <ul class="d-grid gap-2">
                            <li><button type="button" class="btn btn-warning mt-4 text-white">
                                    <i class="bi bi-bag-plus mr-2"></i>Add to cart
                                </button>
                            </li>
                            <li>
                                <a role="button" type="button" class="btn btn-outline-secondary mt-1">
                                <i class="bi bi-pencil-square mr-2"></i>Edit disc
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection