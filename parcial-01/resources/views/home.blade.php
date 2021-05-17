<?php

/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>
@extends('layouts.main')

@section('title', 'Home - Cidi Market')



@section('main')
<div class="container-fluid banner" style="height: 300px; background-color: orange;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="py-5">Cidi Market</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row justify-content-center ">
            @foreach($cds as $cd)
            <div class="card border-warning m-3" style="max-width: 18rem;">
                <div class="card-header">
                    <small>{{$cd->artist->name}}</small> 
                </div>
                <div class="card-body">
                  <h2 class="card-title">{{$cd->title}}</h2>
                  <p class="card-text">
                    {{Str::limit($cd->description, 50)}}
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{route('cds.view', ['cd' => $cd->cd_id])}}">Details</a>
                </div>
            </div>
            @endforeach
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