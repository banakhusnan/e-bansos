<!-- Modal Detail Pendaftaran -->
<div class="modal fade" id="detailPendaftaranModal" tabindex="-1" aria-labelledby="detailPendaftaranModalLabel"
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
                                <li>
                                    <a class="dropdown-item" role="button" id="toActionModal" data-bs-toggle="modal"
                                        data-bs-target="#actionModal">
                                        Setujui sbg Penerima Bansos
                                    </a>
                                </li>
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

<!-- Modal Detail Pendaftaran -->
<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="actionModalLabel">Setujui Pendaftaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form data-action="{{ route('pendaftaran-admin.persetujuan') }}" method="POST" id="formPersetujuan"
                onsubmit="return false">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="statusBansos" class="form-label">Status Bantuan Sosial</label>
                        <div class="input-group">
                            <select type="select" class="form-select" name="status" id="statusBansos">
                                <option value="success">Disetujui</option>
                                <option value="fail">Ditolak</option>
                            </select>
                        </div>
                        <div class="form-text" id="basic-addon4">Pilih status yang diinginkan.</div>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="checkbox" name="id" id="setuju" class="form-check-input" style="width: 1.6em"
                            required>
                        <p class="mb-0">
                            Yakin ingin <span id="showStatusBansos">Menyetujui</span> <span class="fw-bold"
                                id="namaPenerima"></span>
                            sebagai penerima bantuan sosial
                            <span id="showBantuan">dengan jumlah bantuan sebesar Rp 600.000?</span>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#detailPendaftaranModal">Kembali</button>
                    <button type="submit" id="submitPersetujuan" class="btn btn-primary">
                        <div id="spinner" role="status">
                        </div>
                        Setujui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>