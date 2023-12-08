<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Admin page - Cidi Market')

@section('main')

    <div class="container p-4">
        <div class="row gap-2">
          <div class="col-12">
            <h2>Administrator panel</h2>
            <p class="text-secondary">Manage users, shipments and analyze the different site metrics</p>
          </div>
            <div class="p-0 col-lg-8">
              @if($carts->isEmpty())
              <div class="alert alert-info text-center p-4" role="alert">
                  <h3>Your cart is empty</h3>
                  <p>Let's change that - use the app to discover
                      thousand of great deals</p>
                      <a href="{{ url('/') }}" class="btn btn-warning">Return to shop</a>
              </div>
              @else
              <div class="orders-list rounded p-4 border mb-3">
                <h3>Orders List</h3>
                <p class="text-secondary">List of pending, confirmed and rejected shipments</p>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Order</th>
                          <th scope="col">User</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>
                          <th scope="col" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($carts as $cart)
                        <tr>
                          <th scope="row">#0{{$cart->id}}</th>
                          <td><span class="">{{$cart->user->name}}</span></td>
                          <td><span class="">{{$cart->created_at}}</span></td>
                          <td><span class="badge badge-info">{{$cart->status}}</span></td>
                          <td class="text-center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" title="Confirm order" class="btn btn-sm btn-info rounded mr-2">Cart detail</button>
                                </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <div>{{ $carts->links() }}</div>
              </div>
              @endif
              <div class="user-list rounded p-4 border">
                <h3>Users List</h3>
                <p class="text-secondary">Manage site users. Edit names, passwords and permissions</p>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <th scope="row">{{$user->name}}</th>
                          <td>{{$user->email}}</td>
                          <td class="text-center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('users.editForm', ['user' => $user->id]) }}" type="button" title="Edit" class="btn btn-sm btn-light rounded mr-2">
                                    <i class="bi bi-pencil-square"></i></a>
                                  <button type="button" title="Delete" class="btn btn-sm btn-outline-danger rounded"><i class="bi bi-x-octagon"></i></button>
                                </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
            <div class="p-0 col-lg">
              <div class="rounded p-4 border">
                <h3>Shipping graph</h3>
                <p>List of pending, confirmed and rejected shipments</p>
                <div>
                <div>
                  <img src="<?= url('imgs/graph.jpg'); ?>" alt="Image new form" class="img-fluid d-none d-md-block">
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
