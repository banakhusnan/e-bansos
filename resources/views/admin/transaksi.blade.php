@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@section('content-admin')
<h4 class="fw-bold user-select-none py-3">
    {{-- <span class="text-muted fw-light">Bantuan Sosial /</span> --}}
    Laporan Transaksi
</h4>

<div class="card">
    <div class="card-body">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Total Harga</th>
                    <th class="text-center">Tanggal Pembelian</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $transaksi)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $transaksi->users->name }}</td>
                    <td class="text-center">{{ $transaksi->type->name }}</td>
                    <td class="text-center">@formatRupiah($transaksi->price)</td>
                    <td class="text-center">{{ $transaksi->created_at->format('d M, Y') }}</td>
                    <td class="text-center">
                        <a type="button" data-id="{{ $transaksi->id }}" title="Detail"
                            class="badge bg-label-primary text-decoration-none" id="detailTransactionButton"
                            data-bs-toggle="modal" data-bs-target="#transaksiModal">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.components.modal-detail-transaksi')

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ URL::asset('/assets/js/transaksi-admin.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endpush
@endsection