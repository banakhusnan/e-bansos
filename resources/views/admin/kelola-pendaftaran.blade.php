@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@section('content-admin')
<h4 class="fw-bold user-select-none py-3">
    {{-- <span class="text-muted fw-light">Bantuan Sosial /</span> --}}
    Data Pendaftaran
</h4>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Status Pendaftaran</th>
                            <th class="text-center">Status Bansos</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if ($user->hasRole('public'))
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">
                                @if ($user->registrations->registration_state == 1)
                                <i class='bx bxs-check-circle fs-3 text-success'></i>
                                @else
                                <i class='bx bxs-x-circle fs-3 text-danger'></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($user->registrations->bansos_state->value === 'process')
                                <span class="badge bg-warning">
                                    Proses
                                </span>
                                @elseif($user->registrations->bansos_state->value === 'fail')
                                <span class="badge bg-danger">
                                    Ditolak
                                </span>
                                @elseif($user->registrations->bansos_state->value === 'success')
                                <span class="badge bg-danger">
                                    Berhasil
                                </span>
                                @endif
                            </td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                <a type="button" data-id="{{ $user->id }}" title="Detail"
                                    class="badge bg-label-primary text-decoration-none" name="detailButton">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.components.modal-detail-pendaftaran')

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ URL::asset('/assets/js/detail-pendaftaran.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endpush

@endsection