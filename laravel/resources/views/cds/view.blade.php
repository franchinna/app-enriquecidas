<?php
/** @var \App\Models\Cd $cd */
?>

@extends('layouts.main')

@section('title', $cd->title . ' - Cidi Market')
@section('main')

    <div class="container  py-4">
        <div class="row justify-content-center view-product bg-form border p-4 rounded">
            <div class="col-12 mb-3 text-end">
                @guest
                    <p class="alert alert-info text-center" role="alert">
                        If you want to make changes, please <a href="{{ route('auth.login-form') }}">login</a>
                    </p>
                @endguest
            </div>

            <div class="col-md-5 img-centered">
                @if(Storage::disk('public')->exists($cd->imagen))
                    {{-- Con el helper "asset" podemos imprimir un archivo de public. Para que salga de storage, simplemente le prefijamos la ruta 'storage/'. --}}
                    <img src="{{ asset('storage/app/public/' . $cd->imagen) }}" alt="Album cover {{ $cd->title }}">
                @endif
                <img src="<?= url('imgs/image.svg') ?>" alt="{{ $cd->title }} album cover" class="img-fluid">
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
                        @if ($userRol < 2)
                            <form action="{{ route('cds.delete', ['cd' => $cd->cd_id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-x-octagon mr-2"></i> Detele
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
