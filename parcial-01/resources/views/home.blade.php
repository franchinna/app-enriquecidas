{{-- Extendemos el template de views/layouts/main.blade.php --}}
@extends('layouts.main')

@section('title', 'Home - Cidi Market')

{{-- section permite indicar el contenido en qué espacio cedido del layout queremos ubicarlo --}}
@section('main')
<div class="container" style="height: 455px">
    <div class="row">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Page under construction</h5>
                    </div>
                    <div class="modal-body">
                        <img src="<?= url('imgs/under_construction.svg'); ?>" alt="" class="img-fluid">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a role="button" class="btn btn-warning text-white" href="<?= url('/cds'); ?>">Go to Discographies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection