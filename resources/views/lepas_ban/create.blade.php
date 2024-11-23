@extends('layouts.aplikasi')

@section('konten')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Lepas Ban</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('lepas_ban.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cabang_id">Cabang</label>
                                    <select name="cabang_id" id="cabang_id" class="form-select select2 @error('cabang_id') is-invalid @enderror" data-placeholder="Pilih Cabang" required>
                                        <option value=""></option>
                                        @foreach($cabangList as $cabang)
                                            <option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }}</option>
                                        @endforeach
                                    </select>
                                    @error('cabang_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ban_id">No Seri Ban</label>
                                    <select name="ban_id" id="ban_id" class="form-select select2 @error('ban_id') is-invalid @enderror" data-placeholder="Pilih Ban" required>
                                        <option value=""></option>
                                        @foreach($banList as $ban)
                                            <option value="{{ $ban->id }}">{{ $ban->no_seri }} - {{ $ban->merek }}</option>
                                        @endforeach
                                    </select>
                                    @error('ban_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kendaraan_id">Kendaraan</label>
                                    <select name="kendaraan_id" id="kendaraan_id" class="form-select select2 @error('kendaraan_id') is-invalid @enderror" data-placeholder="Pilih Kendaraan" required>
                                        <option value=""></option>
                                        @foreach($kendaraanList as $kendaraan)
                                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nopol }} - {{ $kendaraan->kategori_kend }}</option>
                                        @endforeach
                                    </select>
                                    @error('kendaraan_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_pelepasan">Tanggal Pelepasan</label>
                                    <input type="date" name="tanggal_pelepasan" id="tanggal_pelepasan" class="form-control @error('tanggal_pelepasan') is-invalid @enderror" required>
                                    @error('tanggal_pelepasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="posisi_ban">Posisi Ban</label>
                                    <select name="posisi_ban" id="posisi_ban" class="form-select select2 @error('posisi_ban') is-invalid @enderror" data-placeholder="Pilih Posisi" required>
                                        <option value=""></option>
                                        <option value="Depan Kanan">Depan Kanan</option>
                                        <option value="Depan Kiri">Depan Kiri</option>
                                        <option value="Belakang Kanan">Belakang Kanan</option>
                                        <option value="Belakang Kiri">Belakang Kiri</option>
                                    </select>
                                    @error('posisi_ban')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_ban_lepas">Status Ban Lepas</label>
                                    <select name="status_ban_lepas" id="status_ban_lepas" class="form-select select2 @error('status_ban_lepas') is-invalid @enderror" data-placeholder="Pilih Status" required>
                                        <option value=""></option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                        <option value="Perlu Vulkanisir">Perlu Vulkanisir</option>
                                    </select>
                                    @error('status_ban_lepas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tindakan_akhir">Tindakan Akhir</label>
                                    <select name="tindakan_akhir" id="tindakan_akhir" class="form-select select2 @error('tindakan_akhir') is-invalid @enderror" data-placeholder="Pilih Tindakan" required>
                                        <option value=""></option>
                                        <option value="Simpan">Simpan</option>
                                        <option value="Vulkanisir">Vulkanisir</option>
                                        <option value="Buang">Buang</option>
                                    </select>
                                    @error('tindakan_akhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alasan_lepas">Alasan Lepas</label>
                                    <textarea name="alasan_lepas" id="alasan_lepas" class="form-control @error('alasan_lepas') is-invalid @enderror" rows="3" required></textarea>
                                    @error('alasan_lepas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="km_akhir">KM Akhir</label>
                                    <input type="number" name="km_akhir" id="km_akhir" class="form-control @error('km_akhir') is-invalid @enderror" required>
                                    @error('km_akhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ketebalan_lepas">Ketebalan Lepas (mm)</label>
                                    <input type="number" step="0.1" name="ketebalan_lepas" id="ketebalan_lepas" class="form-control @error('ketebalan_lepas') is-invalid @enderror" required>
                                    @error('ketebalan_lepas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supplier_ban">Supplier Ban</label>
                                    <input type="text" name="supplier_ban" id="supplier_ban" class="form-control @error('supplier_ban') is-invalid @enderror" required>
                                    @error('supplier_ban')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('lepas_ban.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: '100%',
            selectionCssClass: 'select2--large',
            dropdownCssClass: 'select2--large',
            placeholder: function() {
                return $(this).data('placeholder');
            }
        });
    });
</script>
@endpush

@endsection
