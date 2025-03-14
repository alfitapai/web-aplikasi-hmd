@extends('layout.app')
@section('title','Stok')
@section('stok')
<div class="container-fluid p-2">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-5">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Stok Penjualan
                    </h5>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive">
                        <div class="mt-1 mb-5">
                            <table class="table table-bordered table-stripped" id="stokPenjualan">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Item</th>
                                        <th class="text-center" width="20%">Qty</th>
                                        <th class="text-center">Tipe</th>
                                        <th class="text-center">
                                            <button class="btn btn-success tambah-stok"><i class="fa-solid fa-plus"></i></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="listStokPenjualan">
                                    {{-- <tr>
                                        <td>1</td>
                                        <td><input type="text" name="namaitem[]" class="form-control nama-item" disabled></td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <input type="text" name="qty[]" class="form-control qty" inputmode="numeric" disabled>
                                                <input type="text" name="satuan[]" class="form-control satuan" disabled>
                                            </div>
                                        </td>
                                        <td>
                                            <select name="tipe[]" class="form-select" disabled>
                                                <option value="Penjualan">Penjualan</option>
                                                <option value="Inventaris">Inventaris</option>
                                                <option selected>--Tipe--</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-primary edit-baris"><i class="fa-solid fa-pen-to-square"></i></button>
                                                <button class="btn btn-danger hapus-baris"><i class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr> --}}
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

@section('sstok')
<script src="{{ asset('assets/script/laman/stok.js') }}"></script>
@endsection
