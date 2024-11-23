@extends('layouts.aplikasi')

@section('title', 'Edit Pemakaian Ban')

@section('konten')
<div class="pagetitle">
    <h1>Edit Pemakaian Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Pemakaian Ban</h5>

                    <form action="{{ route('pemakaian_ban.update', $pemakaianBan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cabang_id">Cabang</label>
                                    <select name="cabang_id" id="cabang_id" class="form-select select2 @error('cabang_id') is-invalid @enderror" data-placeholder="Pilih Cabang" required>
                                        <option value=""></option>
                                        @foreach($cabangList as $cabang)
                                            <option value="{{ $cabang->id }}" {{ $pemakaianBan->cabang_id == $cabang->id ? 'selected' : '' }}>
                                                {{ $cabang->nama_cabang }}
                                            </option>
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
                                            <option value="{{ $ban->id }}" {{ $pemakaianBan->ban_id == $ban->id ? 'selected' : '' }}>
                                                {{ $ban->no_seri }} - {{ $ban->merek }}
                                            </option>
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
                                            <option value="{{ $kendaraan->id }}" {{ $pemakaianBan->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>
                                                {{ $kendaraan->nopol }} - {{ $kendaraan->kategori_kend }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kendaraan_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_pemakaian">Tanggal Pemakaian</label>
                                    <input type="date" class="form-control @error('tanggal_pemakaian') is-invalid @enderror" 
                                           id="tanggal_pemakaian" name="tanggal_pemakaian" 
                                           value="{{ $pemakaianBan->tanggal_pemakaian }}" required>
                                    @error('tanggal_pemakaian')
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
                                        @foreach(['Depan Kanan', 'Depan Kiri', 'Belakang Kanan', 'Belakang Kiri'] as $posisi)
                                            <option value="{{ $posisi }}" {{ $pemakaianBan->posisi_ban == $posisi ? 'selected' : '' }}>
                                                {{ $posisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('posisi_ban')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_wo">Nomor WO</label>
                                    <input type="text" class="form-control @error('no_wo') is-invalid @enderror" 
                                           id="no_wo" name="no_wo" value="{{ $pemakaianBan->no_wo }}" required>
                                    @error('no_wo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_status_ban">Status Ban</label>
                                    <select name="nama_status_ban" id="nama_status_ban" class="form-select select2 @error('nama_status_ban') is-invalid @enderror" data-placeholder="Pilih Status" required>
                                        <option value=""></option>
                                        @foreach(['Baru', 'Bekas', 'Vulkanisir'] as $status)
                                            <option value="{{ $status }}" {{ $pemakaianBan->nama_status_ban == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nama_status_ban')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="km_awal">KM Awal</label>
                                    <input type="number" class="form-control @error('km_awal') is-invalid @enderror" 
                                           id="km_awal" name="km_awal" value="{{ $pemakaianBan->km_awal }}" required>
                                    @error('km_awal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="km_tempuh">KM Tempuh</label>
                                    <input type="number" class="form-control @error('km_tempuh') is-invalid @enderror" 
                                           id="km_tempuh" name="km_tempuh" value="{{ $pemakaianBan->km_tempuh }}" required>
                                    @error('km_tempuh')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ketebalan">Ketebalan</label>
                                    <input type="number" step="0.1" class="form-control @error('ketebalan') is-invalid @enderror" 
                                           id="ketebalan" name="ketebalan" value="{{ $pemakaianBan->ketebalan }}" required>
                                    @error('ketebalan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('pemakaian_ban.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

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
