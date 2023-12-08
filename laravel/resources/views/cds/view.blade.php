<?php
/** @var \App\Models\Cd $cd */
?>

@extends('layouts.main')

@section('title', $cd->title . ' - Cidi Market')
@section('main')
    <div class="container py-4">
        <div class="row justify-content-center view-product border p-4 rounded">
            <div class="col-12 mb-3 text-end">
                @guest
                    <p class="alert alert-info text-center" role="alert">
                        If you want to make changes, please <a href="{{ route('auth.login-form') }}">login</a>
                    </p>
                @endguest
            </div>

            <div class="col-md-5 img-centered">
                @if (Storage::disk('public')->exists($cd->imagen))
                    <img src="{{ asset('storage/' . $cd->imagen) }}"
                        alt="Album cover {{ $cd->title }}" class="img-fluid  img-home-galery ">
                @else
                    <img src="<?= url('imgs/image.svg') ?>"
                        alt="Album cover {{ $cd->artist->name }} - {{ $cd->title }}">
                @endif
            </div>

            <div class="col-md-7">
                <h2>{{ $cd->title }}</h2>
                <small>{{ $cd->artist->name }} |
                    @if ($cd->genres->count() > 0)
                        @foreach ($cd->genres as $genre)
                            <span class="badge bg-warning">{{ $genre->name }}</span>
                        @endforeach
                    @endif
                </small>
                <ul>
                    <li class="cost"><span class="small">usd</span> {{ $cd->cost / 100 }}</li>
                    <li class="description"><b>Description:</b> {{ $cd->description }}</li>
                    <li class="duration"><b>Disc duration:</b> {{ $cd->duration }} min</li>
                    <li class="release"><b>Release date:</b> {{ $cd->release_date }}</li>
                </ul>

                <div class="d-flex justify-content-end gap-8 mt-4">
                    @auth
                        @if (auth()->user()->rol == 1)
                            <form action="{{ route('cds.delete', ['cd' => $cd->cd_id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-x-octagon mr-2"></i> Delete
                                </button>
                            </form>
                            <a href="{{ route('cds.editForm', ['cd' => $cd->cd_id]) }}" class="btn btn-outline-secondary">
                                <i class="bi bi-pencil-square mr-2"></i> Edit
                            </a>
                        @endif
                    @endauth
                    <a href="{{ url('add-to-cart/' . $cd->cd_id) }}" class="btn btn-warning">
                        Buy CD
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
