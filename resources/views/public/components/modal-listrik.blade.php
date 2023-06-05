<!-- Pembayaran Listrik -->
<div class="modal fade" id="pembayaranListrik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="pembayaranListrikLabel" aria-hidden="true">
    <form action="{{ route('pembayaran.listrik') }}" method="post" id="formListrik">
        @csrf
        <input type="hidden" name="totalNominal" value="">
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
                                <input type="text" placeholder="Masukan no meter/id pelanggan" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- Nominal --}}
                    <div class="row mb-3">
                        <h6 class="mb-2">Nominal</h6>
                        <div class="col-md-4 mb-3">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 25.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 50.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 100.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 125.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body py-2" id="nominal">
                                        Rp 150.000
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="submitListrik()">Beli</button>
                </div>
            </div>
        </div>
    </form>
</div>