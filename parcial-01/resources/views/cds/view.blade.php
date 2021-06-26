<?php
/** @var \App\Models\Cd $cd */
?>

@extends('layouts.main')

@section('title', $cd->title . ' - Cidi Market')
@section('main')

    <div class="container  py-4">
        <div class="row justify-content-center view-product bg-form">
            <div class="col-12 mb-3" style="text-align: end">
                @guest
                <p class="alert alert-info text-center" role="alert">
                    If you want to make changes, please <a href="{{ route('auth.login-form') }}">login</a>
                </p>
                @endguest
                @auth
                <form action="{{route('cds.delete', ['cd'=>$cd->cd_id])}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button href="" class="btn btn-danger mr-2">
                       Detele CD <i class="bi bi-x-octagon ml-2"></i>
                    </button>
                </form>
                <a href="{{ route('cds.editForm', ['cd'=> $cd->cd_id]) }}" class="btn btn-secondary">
                   Edit CD <i class="bi bi-pencil-square ml-2"></i>
                </a>
                @endauth
            </div>

            <div class="col-md-6 img-centered">
                <img src="<?= url('imgs/image.svg') ?>" alt="{{ $cd->title }} album cover" class="img-fluid">
            </div>

            <div class="col-md-6">
                <h2>{{ $cd->title }}</h2>
                <small>{{$cd->artist->name }} | 
                    @if($cd->genres->count() > 0)
                        @foreach($cd->genres as $genre)
                            <span class="badge bg-warning text-white">{{$genre->name}}</span> 
                        @endforeach
                    @endif
                </small>
                <ul>
                    <li class="cost">USD {{ $cd->cost / 100 }}</li>
                    <li class="description"><b>Description:</b> {{ $cd->description }}</li>
                    <li class="duration"><b>Disc duration:</b> {{ $cd->duration }} min</li>
                    <li class="release"><b>Release date:</b> {{ $cd->release_date }}</li>
                </ul>

                <button type="button" disabled class="btn btn-warning mt-4 text-white w-100 btn-block">
                        Add to cart <i class="bi bi-bag-plus ml-2"></i>
                </button>
            </div>
         </div>
    </div>


    

@endsection
