@extends('layout.app')
@section('title', 'Penjualan')
@section('lamanpenjualan')
    <div class="container-fluid p-2">
        <h1 class="h3 mb-3">
            <strong>Daftar Penjualan</strong>
        </h1>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">
                                <button class="btn btn-dark btn-lg laporan" id="laporanBuat">Buat Laporan</button>
                            </h5>
                            <button class="btn btn-success btn-lg tambahitem" id="addItm" data-bs-toggle="modal"
                                data-bs-target="#modalAdd">Tambah Item</button>
                        </div>
                    </div>
                    <div class="card-body px-2">
                        <div class="table-responsive">
                            <div class="mt-1 mb-5">
                                <table class="table table-bordered table-stripped" id="tblPenjualan">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Shift</th>
                                            <th class="text-center">Total Penjualan (Rp.)</th>
                                            <th class="text-center">Pengawas</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('page.penjualan.modal.additem')
@endsection
@section('slamanpenjualan')
    <script src="{{ asset('assets/script/laman/penjualan.js') }}"></script>
@endsection
