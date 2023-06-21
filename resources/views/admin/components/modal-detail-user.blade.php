<!-- Modal -->
<div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <img src="{{ url('/assets/assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="rounded" height="100" width="100" id="uploadedAvatar" />
                            </div>
                            <div class="flex-grow-1 ms-3 my-3">
                                <h3 class="mb-0" id="nama"></h3>
                                <p class="mb-0 fw-bold" id="role"></p>
                                <p class="mb-0 text-muted" id="email"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0">Saldo</h6>
                                    <p class="mb-0" id="showSaldo">Rp 650.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>