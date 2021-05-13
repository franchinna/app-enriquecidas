<?php
/** @var \App\Models\Cd $cd */
?>

@extends('layouts.main')

@section('title', $cd->title . ' - Cidi Market')
@section('main')

    <div class="container">
        <div class="row justify-content-center view-product bg-form">
            <div class="col-12" style="text-align: end">
                <form action="{{route('cds.delete', ['cd'=>$cd->cd_id])}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button href="" class="btn btn-danger"><i class="bi bi-x-octagon mr-2"></i>Detele CD</button>
                </form>
                <a href="" class="btn btn-secondary"><i class="bi bi-pencil-square mr-2"></i>Edit CD</a>
            </div>

            <div class="col-md-4 img-centered">
                <img src="<?= url('imgs/image.svg') ?>" alt="{{ $cd->title }} album cover" class="img-fluid">
            </div>

            <div class="col-md-6">
                <h2>{{ $cd->title }}</h2>
                <small>Aqui va el Artist</small>
                <ul>
                    <li class="cost">USD {{ $cd->cost / 100 }}</li>
                    <li class="description"><b>Description:</b> {{ $cd->description }}</li>
                    <li class="duration"><b>Disc duration:</b> {{ $cd->duration }} min</li>
                    <li class="release"><b>Release date:</b> {{ $cd->release_date }}</li>
                </ul>
            </div>
         </div>
    </div>

@endsection
