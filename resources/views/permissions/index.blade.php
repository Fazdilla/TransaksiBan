@extends('layouts.aplikasi')
@include('users.modal')

@section('konten')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Permissions</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-key"></i> Permissions</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-auto m-2">

                                    <a href="{{ route('permissions.create') }}" class="btn btn-primary fw-bold">Tambah</a>
                                </div>
                            </div>
                            <table class="table table-bordered" id="globalTable">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor seri</th>
                                        <th scope="col">Tanggal Buat</th>
                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($permissions as $prem => $pr)
                                        <tr>
                                            <th scope="row" style="text-align: center">
                                                {{ ++$no }}</th>
                                            <td>{{ $pr->name }}</td>
                                            <td>{{ $pr->guard_name }}</td>
                                            <td>{{ tgl_indo($pr->created_at) }}</td>
                                            <td class="text-center">
                                                {{--
                                                    @can('alatmedis.edit')
                                                    <a href="{{ route('alatmedis.edit', $pr->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bx bxs-pencil"></i>
                                                    </a>
                                                @endcan

                                                @can('alatmedis.delete')
                                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                                        id="{{ $pr->id }}">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                @endcan 
                                                    --}} 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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

    <script>
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
