@extends('layouts.aplikasi')

@section('title', 'Data Pemakaian Ban')

@section('konten')
<div class="pagetitle">
    <h1>Data Pemakaian Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Pemakaian Ban</h5>
                    <div class="mb-3">
                        <a href="{{ route('pemakaian_ban.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Pemakaian Ban
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cabang</th>
                                    <th>No Seri Ban</th>
                                    <th>Kendaraan</th>
                                    <th>Tanggal Pemakaian</th>
                                    <th>Posisi Ban</th>
                                    <th>No WO</th>
                                    <th>Status Ban</th>
                                    <th>KM Awal</th>
                                    <th>KM Tempuh</th>
                                    <th>Ketebalan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pemakaianBans as $pemakaian)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pemakaian->cabang->nama_cabang }}</td>
                                        <td>{{ $pemakaian->ban->no_seri }}</td>
                                        <td>{{ $pemakaian->kendaraan->nopol }}</td>
                                        <td>{{ $pemakaian->tanggal_pemakaian }}</td>
                                        <td>{{ $pemakaian->posisi_ban }}</td>
                                        <td>{{ $pemakaian->no_wo }}</td>
                                        <td>{{ $pemakaian->nama_status_ban }}</td>
                                        <td>{{ $pemakaian->km_awal }}</td>
                                        <td>{{ $pemakaian->km_tempuh }}</td>
                                        <td>{{ $pemakaian->ketebalan }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('pemakaian_ban.show', $pemakaian->id) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('pemakaian_ban.edit', $pemakaian->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('pemakaian_ban.destroy', $pemakaian->id) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
@endpush
