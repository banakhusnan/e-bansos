@extends('layouts.app')

@push('css')
<style>
    .bg-disabled {
        background-color: #eceef1;
    }
</style>
@endpush

@section('content')
@include('layouts.flash')
<h4 class="fw-bold user-select-none py-3">
    <span class="text-muted fw-light">Bantuan Sosial /</span>
    Pendaftaran
</h4>

<div class="card">
    <div class="card-body">
        {{-- Jika sudah terdaftar --}}
        @if ($data->status_pendaftaran == 1)
        <div class="card">
            <div class="card-body">
                <h3 class="fw-bold d-flex align-items-center text-success">
                    <i class='bx bxs-check-circle fs-3 me-2'></i> Telah Mendaftar
                </h3>
                Kamu sudah melakukan pendaftaran, harap tunggu konfirmasi mengenai bantuan dari admin.
            </div>
        </div>
        @endif

        {{-- Jika belum mendaftar --}}
        @if ($data->status_pendaftaran == 0)
        <div class="row mb-3">
            <div class="col-md-12">
                <p class="mb-1">
                    Lengkapi terlebih dahulu data pribadi kamu untuk dapat mendaftar bantuan sosial. Informasi kamu akan
                    kami
                    simpan dengan aman.
                </p>
                <div class="rounded p-4" style="background-color: #FFDE16" role="alert">
                    <h4 class="d-flex align-items-center fw-bold mb-2"><i
                            class="bi bi-exclamation-circle-fill fs-4 me-2"></i>
                        Perhatian!
                    </h4>
                    <p class="mb-0">Pastikan kamu mengumpulkan dokumen sesuai ketentuan, ya!</p>

                    <ul class="mb-0">
                        <li>
                            Kesalahan data pada dokumen berakibat penolakan
                        </li>
                        <li>
                            Pemalsuan dokumen berakibat masuk ke daftar blacklist
                        </li>
                        <li>
                            Sebelum melakukan pendaftaran, dokumen yang kamu isikan pastikan sudah benar.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="formPendaftaran" method="POST" action="{{ route('bansos.pendaftaran') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nama Depan</label>
                            <div class="form-control bg-disabled user-select-none">
                                {{ $name[0] }}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Nama Belakang</label>
                            <div class="form-control user-select-none bg-disabled">
                                {{ implode(' ' ,array_slice($name, 1, count($name))) }}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <div class="form-control user-select-none bg-disabled">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="no_handphone">Nomor Handphone</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <div class="form-control user-select-none bg-disabled ps-2">
                                    {{ $data ? substr($data->no_handphone, 3) : '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                            <div class="form-control user-select-none bg-disabled">
                                {{ $data->date_of_birth ?? '-' }}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="address">Alamat</label>
                            <div class="form-control user-select-none bg-disabled">
                                {{ $data->address ?? '-' }}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="date_of_birth" class="form-label">NIK</label>
                            <div class="form-control user-select-none bg-disabled">
                                {{ $data->nik ?? '-' }}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="address">Pekerjaan</label>
                            <div class="form-control user-select-none bg-disabled">
                                {{ $data->job ?? '-' }}
                            </div>
                        </div>

                        <div class="d-flex gap-2 mb-3">
                            <input class="form-check-input" type="checkbox" required>
                            <span class="fs-6">
                                Saya setuju untuk menggunakan layanan ini sesuai dengan hukum yang berlaku dan tidak
                                akan melakukan kegiatan ilegal atau melanggar hak-hak pihak lain.
                            </span>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary me-2">Ubah Data</a>
                            <button type="submit" id="submit_btn" class="btn btn-primary me-2">Pendaftaran</button>
                        </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@push('js')
<script>
    const checkBox = document.querySelector('[type="checkbox"]')

    checkBox.addEventListener('invalid', ()=> {
        checkBox.setCustomValidity('Harap ceklist terlebih dahulu sebelum melakukan pendaftaran')
    })

    checkBox.addEventListener('change', ()=> {
        checkBox.setCustomValidity('')
    })
</script>
@endpush
@endsection