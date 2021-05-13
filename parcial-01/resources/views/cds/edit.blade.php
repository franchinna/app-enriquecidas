<?php /** @var \Illuminate\Support\ViewErrorBag | \Illuminate\Support\View\MessageBag  $errors*/?>
<?php /** @var \App\Models\Cd $cd */?>

@extends('layouts.main')
@section('main')

<div class="container">
    <div class="row justify-content-center bg-light rounded m-2">
        <div class="col-md-6 align-self-center p-4">
            <img src="" alt="" class="img-fluid">
            <h1>Update CD</h1>
            <p>Please, complete the form to update the album to the sales list</p>
            <img src="<?= url('imgs/add_post.svg'); ?>" alt="" class="img-fluid d-none d-md-block">
        </div>

        <div class="col-md-6 p-4">
            <form action="{{ route('cds.edit', ['cd'=> $cd->cd_id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $cd->title)}}"
                    @error('title') aria-describedby="error-title" @enderror>
                    @error('title')<div class="invalid-feedback d-block" id="error-title">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="textarea" name="description" id="description" class="form-control  @error('description') is-invalid @enderror" aria-describedby="descriptionHelp">{{old('description',$cd->description)}}</textarea>
                    @error('description')<div class="invalid-feedback d-block" id="error-description">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="duration" class="form-label">Duration (min) </label>
                    <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" aria-describedby="durationHelp" value="{{old('duration',$cd->duration)}}" @error('duration') aria-describedby="error-duration" @enderror>
                    @error('duration')<div class="invalid-feedback d-block" id="error-duration">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="cost" class="form-label">Cost (USD) </label>
                    <input type="text" name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror" aria-describedby="costHelp" value="{{old('cost', $cd->cost)}}" @error('cost') aria-describedby="error-cost" @enderror>
                    @error('cost')<div class="invalid-feedback d-block" id="error-cost">{{$message}}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label for="relase_date" class="form-label">Release date</label>
                    <input type="date" name="relase_date" id="relase_date" class="form-control @error('relase_date') is-invalid @enderror" value="{{old('release_date', $cd->release_date)}}" @error('relase_date') aria-describedby="error-relase_date" @enderror>
                    @error('relase_date')<div class="invalid-feedback d-block" id="error-relase_date">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-warning text-white btn-block">Update CD</button>
            </form>
        </div>
    </div>
</div>

@endsection