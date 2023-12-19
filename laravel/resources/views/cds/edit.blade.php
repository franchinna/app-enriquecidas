<?php
/** @var \Illuminate\Support\ViewErrorBag | \Illuminate\Support\View\MessageBag  $errors*/
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Artist[] $artists */
/** @var \App\Models\Cd $cd */
?>

@extends('layouts.main')

@section('title', $cd->title . ' - Cidi Market')
@section('main')

    <div class="container py-4">
        <div class="row justify-content-center bg-light rounded m-2">
            <div class="col-md-6 align-self-center p-4">
                <h2>Update CD</h2>
                <p>Please, complete the form to update the album to the sales list</p>
                @if (Storage::disk('public')->exists($cd->imagen))
                    <img src="{{ asset('storage/' . $cd->imagen) }}" alt="Album cover {{ $cd->title }}"
                        class="img-fluid  img-home-galery  d-none d-md-block">
                @else
                    <img src="<?= url('imgs/image.svg') ?>" alt="Album cover {{ $cd->artist->name }} - {{ $cd->title }}"
                        class="img-fluid  img-home-galery  d-none d-md-block">
                @endif
            </div>

            <div class="col-md-6 p-4">
                <form action="{{ route('cds.edit', ['cd' => $cd->cd_id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $cd->title) }}"
                            @error('title') aria-describedby="error-title" @enderror>
                        @error('title')
                            <div class="invalid-feedback d-block" id="error-title">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror"
                            @error('description') aria-describedby="error-description"@enderror>{{ old('description', $cd->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block" id="error-description">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="artist_id" class="form-label">Artists</label>
                        <select name="artist_id" id="artist_id"
                            class="form-control @error('artist_id') is-invalid @enderror"
                            @error('artist_id') aria-describedby="error-artists" @enderror>
                            <option value="{{ $cdArtist->artist_id }}">{{ $cdArtist->name }}</option>
                            @foreach ($artists as $artist)
                                @if ($artist->artist_id != $cdArtist->artist_id)
                                    {
                                    <option value="{{ $artist->artist_id }}"
                                        @if (old('artist_id') == $artist->artist_id) selected @endif>{{ $artist->name }}</option>
                                    }
                                @endif
                            @endforeach
                        </select>
                        @error('artist_id')
                            <div class="invalid-feedback d-block" id="error-artists">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="duration" class="form-label">Duration (min) </label>
                        <input type="text" name="duration" id="duration"
                            class="form-control @error('duration') is-invalid @enderror"
                            @error('duration') aria-describedby="durationHelp" @enderror
                            value="{{ old('duration', $cd->duration) }}"
                            @error('duration') aria-describedby="error-duration" @enderror>
                        @error('duration')
                            <div class="invalid-feedback d-block" id="error-duration">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="cost" class="form-label">Cost in cents (USD)</label>
                        <input type="text" name="cost" id="cost"
                            class="form-control @error('cost') is-invalid @enderror"
                            @error('cost') aria-describedby="costHelp"  @enderror value="{{ old('cost', $cd->cost) }}"
                            @error('cost') aria-describedby="error-cost" @enderror>
                        @error('cost')
                            <div class="invalid-feedback d-block" id="error-cost">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="release_date" class="form-label">Release date</label>
                        <input type="date" name="release_date" id="release_date"
                            class="form-control @error('release_date') is-invalid @enderror"
                            value="{{ old('release_date', $cd->release_date) }}"
                            @error('release_date') aria-describedby="error-release_date" @enderror>
                        @error('release_date')
                            <div class="invalid-feedback d-block" id="error-release_date">{{ $message }}</div>
                        @enderror
                    </div>
                    <fieldset class="mb-3">
                        <legend>Genres</legend>
                        @foreach ($genres as $genre)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="{{ $genre->name }}">
                                    <input class="form-check-input" type="checkbox" name="genre_id[]"
                                        id="{{ $genre->name }}" value="{{ $genre->genre_id }}"
                                        @if (in_array($genre->genre_id, old('genre_id', $cd->genres->pluck('genre_id')->toArray()))) checked @endif> {{ $genre->name }}
                                </label>
                            </div>
                        @endforeach
                    </fieldset>
                    <div class="text-right">
                        <a  data-toggle="modal" data-target="#cdDelete" class="btn btn-light mr-2">
                            <i class="bi bi-x-octagon mr-2"></i> Delete
                        </a>
                        <button type="submit" class="btn btn-warning text-white">
                            Update CD
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cdDelete" tabindex="-1" aria-labelledby="cdDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Are you sure you want to delete {{ $cd->title }}? </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        @if (Storage::disk('public')->exists($cd->imagen))
                        <img src="{{ asset('storage/' . $cd->imagen) }}"
                            alt="Album cover {{ $cd->title }}" class="img-fluid  img-home-galery ">
                    @else
                        <img src="<?= url('imgs/image.svg') ?>"
                            alt="Album cover {{ $cd->artist->name }} - {{ $cd->title }}" class="img-fluid  img-home-galery ">
                    @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('cds.delete', ['cd' => $cd->cd_id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            
                            <button  data-toggle="modal" data-target="#cdDelete" class="btn btn-danger mr-2">
                                Yes, delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
