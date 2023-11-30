<?php
/** @var \App\Models\Artist[]|\Illuminate\Database\Eloquent\Collection $cds */
/** @var array $formParams */
?>

@extends('layouts.main')

@section('title', 'Shipping List - Cidi Market')

@section('main')

    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-8">
              <div class="rounded p-4 border">
                <h2>Shippings List</h2>
                <p>List of pending, confirmed and rejected shipments</p>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Order #</th>
                          <th scope="col">User</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>
                          <th scope="col" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">#9284</th>
                          <td>franchinna</td>
                          <td>17/19/1992</td>
                          <td><span class="badge badge-info">In Proces</span></td>
                          <td class="text-center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" title="Cancer order" class="btn btn-sm btn-outline-danger rounded mr-2">Cancel</button>
                                  <button type="button" title="Confirm order" class="btn btn-sm btn-success rounded mr-2">Confirm</button>
                                </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">#9283</th>
                          <td>franchinna</td>
                          <td>17/19/1992</td>
                          <td><span class="badge badge-success">Sent</span></td>
                          <td class="text-center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" title="Cancer order" class="btn btn-sm btn-outline-info rounded mr-2">Info</button>
                                </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">#9286</th>
                          <td>franchinna</td>
                          <td>17/19/1992</td>
                          <td><span class="badge badge-danger">Cancel</span></td>
                          <td class="text-center">
                              
                          </td>
                        </tr>
                      </tbody>
                  </table>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="rounded p-4 border">
                <h2>Shipping graph</h2>
                <p>List of pending, confirmed and rejected shipments</p>
                <div>
                  <p>insert graph</p>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
