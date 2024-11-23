@extends('layouts.aplikasi')


@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah User</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header mb-3">
                    <h4><i class="fas fa-unlock"></i> Tambah User</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="row p-2 mb-2 ">
                        <div class="form-group">
                            <label>NAMA USER</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama User"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                        </div>

<div class="row p-2 mb-2 ">

                        <div class="form-group">
                        
                            <label>EMAIL</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        </div>
                        
                        
                               <div class="row p-2 mb-2">
                                <div class="col col-md-6 ">
                                                           <label>PASSWORD</label>
                                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password"
                                        class="form-control @error('password') is-invalid @enderror">
        
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>                       
                                
                                
                            


                            <div class="col col-md-6">
                            
                                    <label>PASSWORD</label>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password"
                                        class="form-control">
                                
                                
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        
                        </div>
                        
                                                


                        <div class="row p-2 mb-2">
                        <div class="col-12 col-md-6 ">
                            <label class="font-weight-bold">ROLE</label>
                            
                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}" id="check-{{ $role->id }}">
                                <label class="form-check-label" for="check-{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        </div>
                        
<div class="card-footer ">
<div class="row justify-content-end p-2">
                        <button class="btn btn-primary mr-2 btn-submit col-auto m-1 fw-bold" type="submit"><i class="fa fa-paper-plane"></i>
                            SIMPAN</button>
                        <button class="btn btn-warning btn-reset col-auto m-1 fw-bold" type="reset"><i class="fa fa-redo"></i> RESET</button>

</div>
</div>
</div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
    $('.select-status').select2();
  });
  </script>
  <script>
    $(document).ready(function() {
    $('.select-nama_almed').select2();
  });
  </script>
@endpush