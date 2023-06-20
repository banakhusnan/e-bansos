<!-- Pembayaran Air -->
<div class="modal fade" id="pembayaranAir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="pembayaranAirLabel" aria-hidden="true">
    <form action="{{ route('pembayaran.air') }}" method="post" id="formAir">
        @csrf
        <input type="hidden" value="" name="nominalWater">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="pembayaranListrikLabel">Pembayaran Air (PDAM)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <img src="{{ url('https://img.antaranews.com/cache/800x533/2017/07/20170703logo-pdam-001ilustrasi1.jpg') }}"
                                width="40%" alt="PDAM" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-2">ID Pelanggan</h6>
                            <div class="input-group">
                                <input name="no_pelanggan" type="text" placeholder="Masukan no pelanggan"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- Nominal --}}
                    <div class="row mb-3">
                        <h6 class="mb-2">Nominal</h6>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCardWater(this, 25000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 25.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCardWater(this, 50000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 50.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCardWater(this, 100000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 100.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCardWater(this, 125000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 125.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCardWater(this, 150000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 150.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCardWater(this, 200000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 200.000
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="row">
                        <h6 class="mb-2">Metode Pembayaran</h6>
                        <div class="col-md-4">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ URL::asset('/assets/img/logo/bansos-logo.png') }}"
                                                alt="bansos-logo" width="30%">

                                            <h6 class="mb-0 fw-bold">ebansos pay</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between align-items-center border-top pt-3">
                    <div>
                        <h6 class="mb-2">Nominal</h6>
                        <p id="totalNominalWater" class="mb-0">Rp 0</p>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="submitListrik()">Beli</button>
                </div>
            </div>
        </div>
    </form>
</div>