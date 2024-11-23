@extends('layouts.aplikasi')

@section('title', 'Data Ban')

@section('konten')
<div class="pagetitle">
    <h1>Data Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Ban</h5>
                    <div class="mb-3">
                        <a href="{{ route('ban.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Ban
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
                                    <th>No Seri</th>
                                    <th>Merek</th>
                                    <th>Ukuran</th>
                                    <th>Type</th>
                                    <th>Status Awal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bans as $ban)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ban->no_seri }}</td>
                                        <td>{{ $ban->merek }}</td>
                                        <td>{{ $ban->ukuran }}</td>
                                        <td>{{ $ban->type }}</td>
                                        <td>{{ $ban->status_awal }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('ban.show', $ban->id) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('ban.edit', $ban->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('ban.destroy', $ban->id) }}" method="POST" class="delete-form">
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
