<?php
/** @var \Illuminate\Support\ViewErrorBag | \Illuminate\Support\View\MessageBag  $errors*/
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres */
?>

@extends('layouts.main')
@section('main')

<div class="container">
    <div class="row justify-content-center bg-light rounded m-2">
        <div class="col-md-6 align-self-center p-4">
            <h1>Create new CD</h1>
            <p>Please, complete the form to add the album to the sales list</p>
            <img src="<?= url('imgs/add_post.svg'); ?>" alt="Image new form" class="img-fluid d-none d-md-block">
        </div>

        <div class="col-md-6 p-4">
            <form action="{{ route('cds.create') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', '')}}"
                    @error('title') aria-describedby="error-title" @enderror>
                    @error('title')<div class="invalid-feedback d-block" id="error-title">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description (Min: 10)</label>
                    <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" @error('description') aria-describedby="error-description" @enderror>{{old('description','')}}</textarea>
                    @error('description')<div class="invalid-feedback d-block" id="error-description">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="artist" class="form-label">Artists</label>
                    <select name="artist_id" id="artist" class="form-control @error('artist_id') is-invalid @enderror"  @error('artist_id') aria-describedby="error-artists" @enderror >
                        <option value="" selected>Select An Artists</option>
                        @foreach($artists as $artist)
                            <option value="{{$artist->artist_id}}" @if(old('artist_id') == $artist->artist_id) selected @endif>{{$artist->name}}</option>
                        @endforeach
                    </select>
                    @error('artist_id')<div class="invalid-feedback d-block" id="error-artists">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="duration" class="form-label">Duration (min) </label>
                    <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" @error('duration') aria-describedby="durationHelp" @enderror value="{{old('duration','')}}" @error('duration') aria-describedby="error-duration" @enderror>
                    @error('duration')<div class="invalid-feedback d-block" id="error-duration">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="cost" class="form-label">Cost in cents (USD)</label>
                    <input type="text" name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror" @error('cost') aria-describedby="costHelp" @enderror value="{{old('cost','')}}" @error('cost') aria-describedby="error-cost" @enderror placeholder="1 USD are 100 cent">
                    @error('cost')<div class="invalid-feedback d-block" id="error-cost">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="release_date" class="form-label">Release date</label>
                    <input type="date" name="release_date" id="release_date" class="form-control @error('release_date') is-invalid @enderror" value="{{old('release_date',date('Y-m-d'))}}" @error('release_date') aria-describedby="error-release_date" @enderror>
                    @error('release_date')<div class="invalid-feedback d-block" id="error-release_date">{{$message}}</div>@enderror
                </div>
                <fieldset class="mb-3">
                    <legend>Genres</legend>
                    @foreach($genres as $genre)
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="{{ $genre->name }}">
                                <input class="form-check-input" type="checkbox" name="genre_id[]" id="{{ $genre->name }}" value="{{ $genre->genre_id }}" @if( in_array($genre->genre_id, old('genre_id', [])) ) checked @endif> {{ $genre->name }}
                            </label>
                        </div>
                    @endforeach
                </fieldset>
                <button type="submit" class="btn btn-warning btn-block">Add disc</button>
            </form>
        </div>
    </div>
</div>

@endsection