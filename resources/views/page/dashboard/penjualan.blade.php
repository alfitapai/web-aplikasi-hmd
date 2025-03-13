<div class="col-12 d-flex">
    <div class="w-100">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="background-color: rgb(244, 244, 244)">
                        {{-- <h1><b>Penjualan</b></h1> --}}
                        <div class="row">
                            @component('layout.components.template.card')
                                @slot('judul')
                                    Total Penjualan
                                @endslot
                                @slot('jumlah')
                                    <div class="col">
                                        <h2>Rp.</h2>
                                    </div>
                                    <div class="col-auto">
                                        <h2>999.999</h2>
                                    </div>
                                @endslot
                                @slot('selisih')
                                    <span>000%</span>
                                @endslot
                            @endcomponent
                            @component('layout.components.template.card')
                                @slot('judul')
                                    Stok A
                                @endslot
                                @slot('jumlah')
                                    <div class="col-auto">
                                        <h2>999</h2>
                                    </div>
                                    <div class="col">
                                        <h2>L</h2>
                                    </div>
                                @endslot
                                @slot('selisih')
                                    <span>000%</span>
                                @endslot
                            @endcomponent
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <canvas id="chartPenjualan"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
