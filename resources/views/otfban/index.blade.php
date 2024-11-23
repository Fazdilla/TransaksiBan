@extends('layouts.aplikasi')

@section('title', 'Data OTF Ban')

@section('konten')
<div class="pagetitle">
    <h1>Data OTF Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar OTF Ban</h5>
                    
                    <div class="mb-3">
                        <a href="{{ route('otfban.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah OTF Ban
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cabang</th>
                                    <th>Ban</th>
                                    <th>Kendaraan</th>
                                    <th>Tanggal OTF</th>
                                    <th>Posisi Ban</th>
                                    <th>Status Ban</th>
                                    <th>KM Tempuh</th>
                                    <th>Ketebalan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($otfBans as $otfBan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $otfBan->cabang->nama_cabang }}</td>
                                    <td>{{ $otfBan->ban->kode_ban }}</td>
                                    <td>{{ $otfBan->kendaraan->nopol }}</td>
                                    <td>{{ $otfBan->tanggal_otf }}</td>
                                    <td>{{ $otfBan->posisi_ban }}</td>
                                    <td>{{ $otfBan->nama_status_ban }}</td>
                                    <td>{{ $otfBan->km_tempuh_otf }}</td>
                                    <td>{{ $otfBan->ketebalan }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('otfban.show', $otfBan->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('otfban.edit', $otfBan->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('otfban.destroy', $otfBan->id) }}" method="POST" class="delete-form">
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
