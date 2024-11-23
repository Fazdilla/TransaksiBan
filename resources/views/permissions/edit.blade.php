@extends('layouts.aplikasi')


@section('konten')

<div class="pagetitle">
    <h1>Edit Master Roles&Permission</h1>
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
                <h5 class="card-title">Form Edit Roles & Permission</h5>

                <!-- General Form Elements -->
            <form action="{{ route('roles.update', $role->id) }}" method="POST" >
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">NAMA ROLE</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" id="name"  value="{{ old('name', $role->name) }}" placeholder="Masukkan Nama Role"
                    class="form-control @error('title') is-invalid @enderror">
                    

                    @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">PERMISSIONS</label>
                    <div class="col-sm-10">
                        @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="permissions[]" 
                                value="{{ $permission->name }}" id="check-{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif >
                                <label class="form-check-label" for="check-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row mb-3">

                    <button type="submit" class="btn btn-primary">Update</button>
                
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