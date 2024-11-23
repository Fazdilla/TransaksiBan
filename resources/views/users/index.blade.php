@extends('layouts.aplikasi')
 @include('users.modal')

@section('konten')

    <div class="pagetitle">
      <h1>Data Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Pengguna</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            
            {{-- <a href="{{ route('users.create') }}"> Tambah</a> --}}
              <h5 class="card-title">Data Pengguna</h5>
              

                <div class="table-responsive">

                <div class="row mb-3">
                 <div class="col">
                                @can('users.create')
                                
                                        <a href="{{ route('users.create') }}" class="btn btn-primary mt-2" style="padding-top: 5px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    
                                @endcan
                                </div>
                                </div>
                        <table class="table table-bordered" id="globalTable">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">Role</th>
                                
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $no => $u)
                                <tr>
                                    <td scope="row" style="text-align: center">{{ ++$no }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>
                                        @if(!empty($u->getRoleNames()))
                                            @foreach($u->getRoleNames() as $role)
                                            <span class="badge bg-danger">{{ $role }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                  
                                    
                                    <td class="text-center">
                                                @can('users.edit')
                                                    <a href="{{ route('users.edit', $u->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bx bxs-pencil"></i>
                                                    </a>
                                                @endcan

                                                @can('users.delete')
                                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                                        id="{{ $u->id }}">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                @endcan
                                            </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <button id="tampilkan-alert">Tampilkan SweetAlert</button> --}}
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection
 
@push('scripts')




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
                        url: "{{ route('users.index') }}/" + id,
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

@endpush