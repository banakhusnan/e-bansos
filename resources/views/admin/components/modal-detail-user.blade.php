<!-- Modal -->
<div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <img src="{{ url('/assets/assets/img/avatars/1.png') }}" alt="user-avatar" class="rounded"
                            height="100" width="100" id="uploadedAvatar" />
                    </div>
                    <div class="flex-grow-1 ms-3 my-3">
                        <h3 class="mb-0" id="nama"></h3>
                        <p class="mb-0 fw-bold" id="role"></p>
                        <p class="mb-0 text-muted" id="alamat"></p>

                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header fw-bold">Personal Information</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
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
                            <div class="col-md-5">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>