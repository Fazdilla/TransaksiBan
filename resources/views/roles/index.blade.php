@extends('layouts.aplikasi')
 @include('users.modal')

@section('konten')

    <div class="pagetitle">
      <h1>HAK AKSES PENGGUNA</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Super Admin</a></li>
          <li class="breadcrumb-item">Hak Akses</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Roles & Permission</h5>
            
                <div class="input-group mb-3">
                        @can('roles.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('roles.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                        @endcan   
                </div>

                <div class="table-responsive">
                        <table class="table table-bordered" id="globalTable">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col" style="width: 15%">NAMA ROLE</th>
                                <th scope="col">PERMISSIONS</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $no => $role)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->getPermissionNames() as $permission)
                                            <button class="btn btn-sm btn-success mb-1 mt-1 mr-1">{{ $permission }}</button>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @can('roles.edit')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bx bxs-pencil"></i>
                                            </a>
                                        @endcan
                                        
                                        {{-- @can('roles.delete')
                                            <button  class="btn btn-sm btn-danger" id="{{ $role->id }}">
                                            <i class="bx bx-trash"></i>
                                            </button>
                                        @endcan --}}

                                           @can('roles.delete')
                                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                                        id="{{ $role->id }}">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection
 
@push('scripts')



<script>
 //ajax delete
        function Delete(id) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route('roles.index') }}/" + id,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
        </script>

<script >
    $(document).ready(function() {
        $('#globalTable').DataTable({
          responsive: true,
                dom: 'Bfrtip',
                buttons: [
        'colvis',
        'excel',
        'print'
    ]
        });
    });
</script>
@endpush