@extends('layout.app')
@section('title', 'Pengaturan')
@section('pengaturan')
    <div class="container-fluid p-2">
        <h1 class="h3 mb-3">
            <strong>Pengaturan</strong>
        </h1>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-1">Shift</h5>
                    </div>
                    <div class="card-body px-2">
                        <div class="table-responsive">
                            <div class="mt-1 mb-5">
                                <table class="table table-bordered table-stripped" id="tblShift">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center">No.</th> --}}
                                            <th class="text-center">Urutan</th>
                                            <th class="text-center">Jam</th>
                                            <th class="text-center"><button class="btn btn-outline-success s-shift"><i
                                                        class="fa-solid fa-pen-to-square"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody id="daftarShift"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('spengaturan')
    <script src="{{ asset('assets/script/laman/user/pengaturan.js') }}"></script>
@endsection
