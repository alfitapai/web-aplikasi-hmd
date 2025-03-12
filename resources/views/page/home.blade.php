@extends('layout.app')
@section('title','Home')
@section('home')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Home</strong></h1>
    <div class="row">
        <div class="col-12 d-flex order-3 order-xl-2">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-0">
                            <button class="btn btn-dark bnt-lg ">button</button>
                        </h5>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive">
                        <div class="mt-1 mb-5">
                            <table class="table table-bordered table*stripped">
                                <thead>
                                    <tr>
                                        <th class="text-center">kolom</th>
                                        <th class="text-center">kolom</th>
                                        <th class="text-center">kolom</th>
                                        <th class="text-center">kolom</th>
                                        <th class="text-center">kolom</th>
                                        <th class="text-center">kolom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>isi</td>
                                        <td>isi</td>
                                        <td>isi</td>
                                        <td>isi</td>
                                        <td>isi</td>
                                        <td>isi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
