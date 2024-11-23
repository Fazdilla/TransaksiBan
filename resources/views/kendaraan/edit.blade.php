@extends('layouts.aplikasi')

@section('title', 'Edit Kendaraan')

@section('konten')
<div class="pagetitle">
    <h1>Edit Kendaraan</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Kendaraan</h5>

                    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nopol">No. Polisi</label>
                                    <input type="text" class="form-control @error('nopol') is-invalid @enderror" 
                                           id="nopol" name="nopol" value="{{ old('nopol', $kendaraan->nopol) }}" required>
                                    @error('nopol')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kapasitas">Kapasitas</label>
                                    <select name="kapasitas" id="kapasitas" class="form-select select2 @error('kapasitas') is-invalid @enderror" data-placeholder="Pilih Kapasitas" required>
                                        <option value=""></option>
                                        <option value="2 Ton" {{ old('kapasitas', $kendaraan->kapasitas) == '2 Ton' ? 'selected' : '' }}>2 Ton</option>
                                        <option value="4 Ton" {{ old('kapasitas', $kendaraan->kapasitas) == '4 Ton' ? 'selected' : '' }}>4 Ton</option>
                                        <option value="6 Ton" {{ old('kapasitas', $kendaraan->kapasitas) == '6 Ton' ? 'selected' : '' }}>6 Ton</option>
                                        <option value="8 Ton" {{ old('kapasitas', $kendaraan->kapasitas) == '8 Ton' ? 'selected' : '' }}>8 Ton</option>
                                        <option value="10 Ton" {{ old('kapasitas', $kendaraan->kapasitas) == '10 Ton' ? 'selected' : '' }}>10 Ton</option>
                                    </select>
                                    @error('kapasitas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori_kend">Kategori Kendaraan</label>
                                    <select name="kategori_kend" id="kategori_kend" class="form-select select2 @error('kategori_kend') is-invalid @enderror" data-placeholder="Pilih Kategori" required>
                                        <option value=""></option>
                                        <option value="Truck" {{ old('kategori_kend', $kendaraan->kategori_kend) == 'Truck' ? 'selected' : '' }}>Truck</option>
                                        <option value="Pick Up" {{ old('kategori_kend', $kendaraan->kategori_kend) == 'Pick Up' ? 'selected' : '' }}>Pick Up</option>
                                        <option value="Box" {{ old('kategori_kend', $kendaraan->kategori_kend) == 'Box' ? 'selected' : '' }}>Box</option>
                                        <option value="Trailer" {{ old('kategori_kend', $kendaraan->kategori_kend) == 'Trailer' ? 'selected' : '' }}>Trailer</option>
                                    </select>
                                    @error('kategori_kend')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
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
