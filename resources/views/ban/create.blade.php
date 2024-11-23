@extends('layouts.aplikasi')

@section('title', 'Tambah Ban')

@section('konten')
<div class="pagetitle">
    <h1>Tambah Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Tambah Ban</h5>

                    <form action="{{ route('ban.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_seri">No Seri</label>
                                    <input type="text" class="form-control @error('no_seri') is-invalid @enderror" 
                                           id="no_seri" name="no_seri" value="{{ old('no_seri') }}" required>
                                    @error('no_seri')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="merek">Merek</label>
                                    <input type="text" class="form-control @error('merek') is-invalid @enderror" 
                                           id="merek" name="merek" value="{{ old('merek') }}" required>
                                    @error('merek')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ukuran">Ukuran</label>
                                    <input type="text" class="form-control @error('ukuran') is-invalid @enderror" 
                                           id="ukuran" name="ukuran" value="{{ old('ukuran') }}" required>
                                    @error('ukuran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-select select2 @error('type') is-invalid @enderror" data-placeholder="Pilih Type" required>
                                        <option value=""></option>
                                        <option value="Tube Type" {{ old('type') == 'Tube Type' ? 'selected' : '' }}>Tube Type</option>
                                        <option value="Tubeless" {{ old('type') == 'Tubeless' ? 'selected' : '' }}>Tubeless</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_awal">Status Awal</label>
                                    <select name="status_awal" id="status_awal" class="form-select select2 @error('status_awal') is-invalid @enderror" data-placeholder="Pilih Status" required>
                                        <option value=""></option>
                                        <option value="Baru" {{ old('status_awal') == 'Baru' ? 'selected' : '' }}>Baru</option>
                                        <option value="Bekas" {{ old('status_awal') == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                                        <option value="Vulkanisir" {{ old('status_awal') == 'Vulkanisir' ? 'selected' : '' }}>Vulkanisir</option>
                                    </select>
                                    @error('status_awal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('ban.index') }}" class="btn btn-secondary">Kembali</a>
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
