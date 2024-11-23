@extends('layouts.aplikasi')


@section('konten')
    <div class="pagetitle">
        <h1>Input Master Roles&Permission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Form</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Roles&Permission</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Master Roles & Permission</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Permission </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        placeholder="Masukkan Nama Controller"
                                        class="form-control @error('title') is-invalid @enderror">


                                    @error('name')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label for="cont">Controller</label>

                                </div>
                                <div class="col sm-10">

                                    <select name="cont" class="form-select select-status">
                                        <option class="" disabled selected>Pilih Controller</option>
                                        <option class="index">Index</option>
                                        <option class="create">Create</option>
                                        <option class="edit">Edit</option>

                                    </select>
                                </div>

                            </div>




                            <div class="card-footer">
                                <div class="row justify-content-end">
                                    <div class="col-auto">

                                        <button type="submit" class="btn btn-primary fw-bold">Simpan</button>
                                    </div>
                                </div>
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
