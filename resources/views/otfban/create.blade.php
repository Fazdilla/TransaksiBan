@extends('layouts.aplikasi')

@section('title', 'Tambah OTF Ban')

@section('konten')
<div class="pagetitle">
    <h1>Tambah OTF Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Tambah OTF Ban</h5>

                    <form action="{{ route('otfban.store') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cabang_id">Cabang</label>
                                    <select name="cabang_id" id="cabang_id" class="form-select select2 @error('cabang_id') is-invalid @enderror" data-placeholder="Pilih Cabang" required>
                                        <option value=""></option>
                                        @foreach($cabangs as $cabang)
                                            <option value="{{ $cabang->id }}" {{ old('cabang_id') == $cabang->id ? 'selected' : '' }}>
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
                                    <label for="ban_id">Ban</label>
                                    <select name="ban_id" id="ban_id" class="form-select select2 @error('ban_id') is-invalid @enderror" data-placeholder="Pilih Ban" required>
                                        <option value=""></option>
                                        @foreach($bans as $ban)
                                            <option value="{{ $ban->id }}" {{ old('ban_id') == $ban->id ? 'selected' : '' }}>
                                                {{ $ban->kode_ban }}
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
                                        @foreach($kendaraans as $kendaraan)
                                            <option value="{{ $kendaraan->id }}" {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                                                {{ $kendaraan->nopol }}
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
                                    <label for="tanggal_otf">Tanggal OTF</label>
                                    <input type="datetime-local" class="form-control @error('tanggal_otf') is-invalid @enderror" 
                                           id="tanggal_otf" name="tanggal_otf" value="{{ old('tanggal_otf') }}" required>
                                    @error('tanggal_otf')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="posisi_ban">Posisi Ban</label>
                                    <input type="number" class="form-control @error('posisi_ban') is-invalid @enderror" 
                                           id="posisi_ban" name="posisi_ban" value="{{ old('posisi_ban') }}" required>
                                    @error('posisi_ban')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_status_ban">Status Ban</label>
                                    <input type="text" class="form-control @error('nama_status_ban') is-invalid @enderror" 
                                           id="nama_status_ban" name="nama_status_ban" value="{{ old('nama_status_ban') }}" required>
                                    @error('nama_status_ban')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="km_tempuh_otf">KM Tempuh</label>
                                    <input type="number" class="form-control @error('km_tempuh_otf') is-invalid @enderror" 
                                           id="km_tempuh_otf" name="km_tempuh_otf" value="{{ old('km_tempuh_otf') }}" required>
                                    @error('km_tempuh_otf')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ketebalan">Ketebalan</label>
                                    <input type="text" class="form-control @error('ketebalan') is-invalid @enderror" 
                                           id="ketebalan" name="ketebalan" value="{{ old('ketebalan') }}" required>
                                    @error('ketebalan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('otfban.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
