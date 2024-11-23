@extends('layouts.aplikasi')


@section('konten')

<div class="pagetitle">
    <h1>Edit Master Alat Medis</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Form</a></li>
        <li class="breadcrumb-item">Data Master</li>
        <li class="breadcrumb-item active">Alat Medis</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Master Alat Medis</h5>

                <!-- General Form Elements -->

                <form action="{{ route('almed.update', $almed->id ) }}" method="POST" >
                    @csrf
                    @method('PUT')

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Alat Medis</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_almed" value="{{ old('nama_almed', $almed->nama_almed) }}" placeholder="Masukkan Nama Alat Medis" 
                    class="form-control @error('nama_almed') is-invalid @enderror">
                    

                        @error('nama_almed')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                    <input type="text" name="keterangan" value="{{ old('keterangan', $almed->keterangan) }}" placeholder="Masukkan Keterangan" 
                    class="form-control @error('keterangan') is-invalid @enderror">
                    

                        @error('keterangan')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">

                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                
                </div>

            </form><!-- End General Form Elements -->

            </div>
        </div>
    </div>

</section>

@endsection

@push('scripts')


  
    $(document).ready(function() {
    $('.select-status').select2();
  });
  </script>
@endpush