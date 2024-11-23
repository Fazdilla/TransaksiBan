@extends('layouts.aplikasi')


@section('konten')

<div class="pagetitle">
    <h1>Input Master Ruangan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Form</a></li>
        <li class="breadcrumb-item">Data Master</li>
        <li class="breadcrumb-item active">Ruangan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Master Ruangan</h5>

                <!-- General Form Elements -->
            <form action="{{ route('ruang.store') }}" method="POST" >
                @csrf

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Ruangan</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_ruangan" value="{{ old('nama_ruangan') }}" placeholder="Masukkan Nama Ruangan" 
                    class="form-control @error('name') is-invalid @enderror">
                    

                        @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                    <input type="text" name="Keterangan" value="{{ old('Keterangan') }}" placeholder="Masukkan Nama Ruangan" 
                    class="form-control @error('name') is-invalid @enderror">
                    

                        @error('name')
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
  <script>
    $(document).ready(function() {
    $('.select-status').select2();
  });
  </script>
@endpush