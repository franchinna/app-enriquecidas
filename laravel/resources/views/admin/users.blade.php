<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Admin users - Cidi Market')

@section('main')

    <div class="container p-4">
        <div class="row align-content-center justify-content-between mb-4 gap-2">
            <div class="col-12 d-flex align-content-center justify-content-between">
                <div>
                    <h2 class="">User admin panel</h2>
                    <p class="text-secondary">Apply subtitulito here</p>
                </div>
                <div class="align-self-center">
                    <a href="<?= url('/admin') ?>" class="btn btn-secondary btn-sm">Go back</a>
                    <a href="<?= url('admin/carts') ?>"class="btn btn-warning btn-sm">Go to shipping page</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="user-list rounded p-4 border">
                    <h3>Users List</h3>
                    <p class="text-secondary">Manage site users. Edit names, passwords and permissions</p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Available</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->name }}</th>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if ($user->available == 'Y')
                                            <span class="badge badge-pill badge-primary">{{ $user->available }}</span>
                                        @else
                                            <span class="badge badge-pill badge-secondary">{{ $user->available }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.edit', ['user' => $user->id]) }}" type="button"
                                                title="Edit" class="btn btn-sm btn-light rounded mr-2">
                                                <i class="bi bi-pencil-square"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>{{ $users->links() }}</div>
                </div>
            </div>

            <div class="col-12 gap-2 d-flex">
                <div class="rounded p-4 border">
                    <h3>{{ $chart->options['chart_title'] }}</h3>
                    <p class="text-secondary f-14">List of pending, confirmed and rejected shipments</p>
                    {!! $chart->renderHtml() !!}
                </div>
                <div class="rounded p-4 border">
                    <h3>{{ $chart2->options['chart_title'] }}</h3>
                    <p class="text-secondary f-14">List of pending, confirmed and rejected shipments</p>
                    {!! $chart2->renderHtml() !!}
                </div>
                <div class="rounded p-4 bg-dotted text-center w-100 h-100 d-flex align-items-center justify-content-center text-secondary">
                    More graph comming soon
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    {!! $chart->renderChartJsLibrary() !!}

    {!! $chart->renderJs() !!}
    {!! $chart2->renderJs() !!}
@endsection
