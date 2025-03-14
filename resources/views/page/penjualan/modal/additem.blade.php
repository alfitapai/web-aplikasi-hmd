<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalAdd" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalAddTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4><strong>Tambah Data</strong></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                            <div class="form-floating">
                                <input type="date" name="tanggal" id="Tanggal" class="form-control"
                                    placeholder="Tanggal">
                                <label for="Tanggal">Tanggal</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                            <div class="form-floating">
                                <select name="shift" id="Shift" class="form-select">
                                    <option selected>--Shift--</option>
                                    @foreach ($shift as $jam )
                                    <option value="{{ $jam->id }}">{{ $jam->urutan }} : {{ $jam->jam }}</option>
                                    @endforeach
                                    {{-- <option value="1">1: 00.00WIB - 00.00WIB</option>
                                    <option value="2">2: 01.00WIB - 01.00WIB</option> --}}
                                </select>
                                <label for="Shift">Shift</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="total" id="Total" placeholder="Total Penjualan"
                                    class="form-control" inputmode="numeric">
                                <label for="Total">Total Penjualan Rp.</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-floating">
                                <select name="pengawas" id="Pengawas" class="form-select" placeholder="Pengawas">
                                    <option selected>--Nama Pengawas--</option>
                                    @foreach ($pengawas as $supervisor )
                                    <option value="{{ $supervisor->id }}">{{ $supervisor->userid }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="pengawas" id="Pengawas" placeholder="Pengawas"
                                    class="form-control"> --}}
                                <label for="Pengawas">Pengawas</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="TutupUpah" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="simpanUpah" type="button" class="btn btn-success">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
