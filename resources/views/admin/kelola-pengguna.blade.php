@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@section('content-admin')
<h4 class="fw-bold user-select-none py-3">
    {{-- <span class="text-muted fw-light">Bantuan Sosial /</span> --}}
    Kelola Pengguna
</h4>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if ($user->hasRole('public'))
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if ($user->hasRole('public'))
                                <span class="badge bg-primary">public</span>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
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

@include('admin.components.modal-detail-user')

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ URL::asset('/assets/js/detail-user.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endpush

@endsection