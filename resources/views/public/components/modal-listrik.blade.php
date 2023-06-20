<!-- Pembayaran Listrik -->
<div class="modal fade" id="pembayaranListrik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="pembayaranListrikLabel" aria-hidden="true">
    <form action="{{ route('pembayaran.listrik') }}" method="post" id="formListrik">
        @csrf
        <input type="hidden" value="" name="nominal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="pembayaranListrikLabel">Pembayaran Listrik (PLN)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <img src="{{ url('https://ifoxsoft.com/wp-content/uploads/2022/10/Logo-Listrik-Pintar-PNG-%E2%80%93-ifoxsoft.com_.webp') }}"
                                width="50%" alt="PLN" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-2">No Meter/ID Pelanggan</h6>
                            <div class="input-group">
                                <input name="no_pelanggan" type="text" placeholder="Masukan no meter/id pelanggan"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- Nominal --}}
                    <div class="row mb-3">
                        <h6 class="mb-2">Nominal</h6>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCard(this, 25000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 25.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCard(this, 50000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 50.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCard(this, 100000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 100.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCard(this, 125000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 125.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCard(this, 150000)">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 150.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#" onclick="selectCard(this, 200000)">
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
                                        <img src="{{ asset('/assets/img/logo/alfamart-logo.png') }}" width="100px"
                                            alt="" srcset="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between align-items-center border-top pt-3">
                    <div>
                        <h6 class="mb-2">Nominal</h6>
                        <p id="totalNominal" class="mb-0">Rp 0</p>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="submitListrik()">Beli</button>
                </div>
            </div>
        </div>
    </form>
</div>