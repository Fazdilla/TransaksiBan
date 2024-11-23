@extends('layouts.aplikasi')

@section('konten')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Data Lepas Ban</h4>
                    <a href="{{ route('lepas_ban.create') }}" class="btn btn-primary float-end">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cabang</th>
                                    <th>No Seri Ban</th>
                                    <th>Nopol Kendaraan</th>
                                    <th>Tanggal Pelepasan</th>
                                    <th>Posisi Ban</th>
                                    <th>Status Ban Lepas</th>
                                    <th>Tindakan Akhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lepasBans as $index => $lepasBan)
                                <tr>
                                    <td>{{ $index + $lepasBans->firstItem() }}</td>
                                    <td>{{ $lepasBan->cabang->nama_cabang }}</td>
                                    <td>{{ $lepasBan->ban->no_seri }}</td>
                                    <td>{{ $lepasBan->kendaraan->nopol }}</td>
                                    <td>{{ $lepasBan->tanggal_pelepasan }}</td>
                                    <td>{{ $lepasBan->posisi_ban }}</td>
                                    <td>{{ $lepasBan->status_ban_lepas }}</td>
                                    <td>{{ $lepasBan->tindakan_akhir }}</td>
                                    <td>
                                        <a href="{{ route('lepas_ban.edit', $lepasBan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('lepas_ban.destroy', $lepasBan->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $lepasBans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
