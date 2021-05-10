@extends('layouts.main')
@section('main')

<div class="container">
    <div class="row justify-content-center bg-light rounded m-2">
        <div class="col-md-6 align-self-center p-4">
            <img src="" alt="" class="img-fluid">
            <h1>Upload CD</h1>
            <p>Please, complete the form to add the album to the sales list</p>
            <img src="<?= url('imgs/add_post.svg'); ?>" alt="" class="img-fluid d-none d-md-block">
        </div>

        <div class="col-md-6 p-4">
            <form action="{{ route('cds.create') }}" method="post" class="">
                @csrf
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" aria-describedby="titleHelp">
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="textarea" name="description" id="description" class="form-control" aria-describedby="descriptionHelp"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" name="duration" id="duration" class="form-control" aria-describedby="durationHelp">
                </div>
                <div class="form-group mb-3">
                    <label for="cost" class="form-label">Cost</label>
                    <input type="text" name="cost" id="cost" class="form-control" aria-describedby="costHelp">
                </div>
                <div class="form-group mb-3">
                    <label for="relase_date" class="form-label">Release date</label>
                    <input type="date" name="relase_date" id="relase_date" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <button type="submit" class="btn btn-warning text-white btn-block">Add disc</button>
            </form>
        </div>
    </div>
</div>

@endsection