@extends('layouts.aplikasi')


@section('konten')

<div class="pagetitle">
    <h1>Input Master Standar Data</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Form</a></li>
        <li class="breadcrumb-item">Standar Data</li>
        <li class="breadcrumb-item active">Status</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                        <h5 class="card-title">Form Master Status</h5>

                    <!-- General Form Elements -->
                        <form action="{{ route('status.store') }}" method="POST" >
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Master</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="master" value="{{ old('master') }}"
                                                    placeholder="Masukkan master Status"
                                                    class="form-control @error('master') is-invalid @enderror">

                                                @error('master')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            
                                    </div>
                                </div>

                        

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ID Status</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="status_no" value="{{ old('status_no') }}"
                                                    placeholder="Masukkan ID Status"
                                                    class="form-control @error('status_no') is-invalid @enderror">

                                                @error('status_no')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nama Status</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nama_status" value="{{ old('nama_status') }}"
                                                    placeholder="Masukkan ID Status"
                                                    class="form-control @error('nama_status') is-invalid @enderror">

                                                @error('nama_status')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                                                    placeholder="Masukkan Keterangan Status"
                                                    class="form-control @error('keterangan') is-invalid @enderror">

                                                @error('keterangan')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="deskripsi" value="{{ old('deskripsi') }}"
                                                    placeholder="Masukkan Deskripsi Status"
                                                    class="form-control @error('deskripsi') is-invalid @enderror">

                                                @error('deskripsi')
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
    </div>

</section>

@endsection