@extends('layouts.aplikasi')


@section('konten')

<div class="pagetitle">
    <h1>User Ruangan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Form</a></li>
        <li class="breadcrumb-item">Data Master</li>
        <li class="breadcrumb-item active">User Ruangan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Master tambah Ruangan ke User</h5>

                <!-- General Form Elements -->
            <form action="{{ route('user.tambah-ruangan-user', $user->id) }}" method="POST" >
                @csrf
              

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Pilih Ruangan : </label>
                    <div class="col-sm-10">
                        <select class="form-select select-ruang @error('ruangan_id') is-invalid @enderror"
                            id="ruangan_id" name="ruangan_id"aria-label="Default select example">
                                        <option value="" disabled selected>Pilih</option>
                                        @foreach ($ruangans as $ruangan)
                                            <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}</option>
                                        @endforeach
                        </select>
                                    @error('ruangan_id')
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