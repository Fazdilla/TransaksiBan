@extends('layouts.aplikasi')

@section('konten')

    <div class="pagetitle">
      <h1>Standar Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Master</a></li>
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
              <h5 class="card-title">Master Data Status</h5>
              
                <form action="{{ route('status.index') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    
                                <div class="input-group-prepend">
                                            <a href="{{ route('status.create') }}" class="btn btn-primary"
                                                style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                </div>
                                    
                                
                                </div>
                            </div>
                </form>

                <div class="table-responsive">
                        <table class="table table-bordered" id="globalTable">
                        <thead>
                                    <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                        <th scope="col">Master</th>
                                        <th scope="col">ID Status</th>
                                        <th scope="col">Nama Status</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Deskripsi</th>                        
                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($statuses as $no => $status)
                                        <tr>
                                            <th scope="row" style="text-align: center">
                                                {{ ++$no }}</th>
                                            <td>{{ $status->master }}</td>
                                            <td>{{ $status->status_no }}</td>
                                            <td>{{ $status->nama_status }}</td>
                                            <td>{{ $status->keterangan }}</td>
                                            <td>{{ $status->deskripsi }}</td>
                                            
                                            <td class="text-center">
                                                @can('statuses.edit')
                                                    <a href="{{ route('status.edit', $status->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bx bxs-pencil"></i>
                                                    </a>
                                                @endcan

                                                @can('statuses.delete')
                                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                                        id="{{ $status->id }}">
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
     // Menangkap tombol dengan ID "tampilkan-alert"
  const tombolTampilkanAlert = document.getElementById("tampilkan-alert");

// Menambahkan event listener untuk tombol
tombolTampilkanAlert.addEventListener("click", () => {
  // Menampilkan SweetAlert2
  Swal.fire({
    title: 'Hello, SweetAlert2!',
    text: 'Ini adalah contoh SweetAlert2 di HTML.',
    icon: 'success', // Jenis ikon (success, error, warning, info, question)
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
                        url: "{{ route('status.index') }}/" + id,
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