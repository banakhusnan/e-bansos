<!-- Modal -->
<div class="modal fade" id="detailPendaftaranModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pendaftaran</h1> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom py-2">
                        {{-- Header --}}
                        <h5 class="fw-bold mb-0">Personal Information</h5>

                        {{-- Dropdown Button --}}
                        <div class="btn-group">
                            <button type="button" class="btn btn-icon dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body pt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">Nama Awal</p>
                                    <p id="namaAwal"></p>
                                </div>
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">Nama Akhir</p>
                                    <p id="namaAkhir"></p>
                                </div>
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">Email</p>
                                    <p id="email"></p>
                                </div>
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">Alamat</p>
                                    <p id="alamatPersonal"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">Pekerjaan</p>
                                    <p id="job"></p>
                                </div>
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">NIK</p>
                                    <p id="nik"></p>
                                </div>
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">Tanggal Lahir</p>
                                    <p id="date_of_birth"></p>
                                </div>
                                <div class="d-block align-items-center mb-3">
                                    <p class="fw-bold mb-0">Nomor Handphone</p>
                                    <p id="no_handphone"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>