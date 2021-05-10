<?php
/** @var \App\Models\Cd $cd */
?>

@extends('layouts.main')

@section('title', $cd->title . ' - Cidi Market')
@section('main')

<div class="container">
    <div class="row justify-content-center view-product bg-form">
        <div class="col-md-4 img-centered">
            <img src="<?= url('imgs/image.svg'); ?>" alt="{{$cd->title}} album cover" class="img-fluid">
        </div>
        <div class="col-md-6 mt-md-5">
        <h2>{{$cd->title}}</h2>
        <small>Aqui va el Artist</small>
            <ul>
                <li class="cost">USD {{$cd->cost / 100 }}</li>
                <li class="description"><b>Description:</b> {{$cd->description}}</li>
                <li class="duration"><b>Disc duration:</b> {{$cd->duration}} min</li>
                <li class="release"><b>Release date:</b> {{$cd->release_date}}</li>
            </ul>
        </div>
    </div>
</div>

@endsection