{{-- Extendemos el template de views/layouts/main.blade.php --}}
@extends('layouts.main')

@section('title', 'Home - Cidi Market')

{{-- section permite indicar el contenido en qué espacio cedido del layout queremos ubicarlo --}}
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Bienvenidos a DV Películas</h1>
            <p>Da Vinci con tu cuota ahora te ofrece acceso a múltiples películas de nuestro selecto catálogo.</p>
        </div>
    </div>
</div>
@endsection