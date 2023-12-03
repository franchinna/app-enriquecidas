<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Discographies list - Cidi Market')

@section('main')

    <div class="container d-flex  py-4">
        <div class="row justify-content-center">
            <div @guest class="col-md-12" @endguest @auth class="col-md-9" @endauth>
                <h1>Discographies List</h1>
                <p class="text-secondary">Explore our vast collection of CDs on our platform</p>
            </div>
            @auth
                @if (auth()->user()->rol == 1)
                    <div class="col-md-3 text-center add-cd my-mb-0 my-mb-0 my-2">
                        <a class="btn btn-light" href="{{ url('/cds/new') }}" role="button">
                            <i class="bi bi-plus-square mr-2"></i> Add CD
                        </a>
                    </div>
                @endif
            @endauth

            @foreach ($cds as $cd)
                <article class="col-md-10 mb-3">
                    <div class="card card-body">
                        <div class="media align-items-center text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0">

                                @if (Storage::disk('public')->exists($cd->imagen))
                                    <img src="{{ asset('storage/' . $cd->imagen) }}" width="150" height="150"
                                        alt="Album cover {{ $cd->title }}" class="img-fluid  img-home-galery ">
                                @else
                                    <img src="<?= url('imgs/image.svg') ?>" width="150" height="150"
                                        alt="Album cover {{ $cd->artist->name }} - {{ $cd->title }}">
                                @endif

                            </div>

                            <div class="media-body">
                                <h2 class="media-title font-weight-semibold">
                                    <a class="text-primary"
                                        href="{{ route('cds.view', ['cd' => $cd->cd_id]) }}">{{ $cd->title }}</a>
                                </h2>
                                <ul class="list-inline list-inline-dotted mb-3 text-muted">
                                    <li class="list-inline-item">{{ $cd->artist->name }}</li>
                                    <li class="list-inline-item">|</li>
                                    <li class="list-inline-item">Release date: {{ $cd->release_date }}</li>
                                </ul>
                                <p class="mb-3">{{ Str::limit($cd->description, 150) }}</p>
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">
                                        @if ($cd->genres->count() > 0)
                                            @foreach ($cd->genres as $genre)
                                                <span class="badge bg-warning">{{ $genre->name }}</span>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <p class="price mb-0">usd {{ $cd->cost / 100 }}</p>
                                <div>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <div class="text-muted">Duration {{ $cd->duration }} min</div>

                                <ul class="d-grid gap-2 list-inline mt-2">
                                    <li class="list-inline-item">
                                        <a href="{{ url('add-to-cart/' . $cd->cd_id) }}" class="btn btn-warning">
                                            Buy
                                        </a>
                                    </li>
                                    @auth
                                    @if (auth()->user()->rol == 1)
                                            <li class="list-inline-item">
                                                <a class="btn btn-outline-secondary"
                                                    href="{{ route('cds.editForm', ['cd' => $cd->cd_id]) }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="{{ route('cds.delete', ['cd' => $cd->cd_id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger">
                                                        <i class="bi bi-x-octagon"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        {{ $cds->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
