@extends('layouts.aplikasi')

@section('konten')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="pagetitle">
      <h1>Data Master Ban</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">PT PUTRA UTAMA ANDA</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Upload</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Upload Data Excel</h5>
                
                  <div class="container mt-3">
                    <h2>Upload File</h2>
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" id="uploadForm">
                      @csrf
                        <div class="mb-3">
                            <label for="upload_excel" class="form-label">Pilih file untuk diupload</label>
                            <input class="form-control" type="file" id="upload_excel" name="upload_excel">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>

                <div id="loadingSpinner" style="display:none;">
                  <div class="spinner-border text-warning" style="width: 50px; height: 50px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <p>Memproses data, harap tunggu...</p>
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>

@push('scripts')
  <script >
    document.getElementById('uploadForm').addEventListener('submit', function () {
      document.getElementById('loadingSpinner').style.display = 'block';
    });
  </script>
@endpush
@endsection
 


