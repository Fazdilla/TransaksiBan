@extends('layouts.aplikasi')

@section('konten')

    <div class="pagetitle">
      <h1>Data User Ruangan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">UserRuangan</a></li>
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
              <h5 class="card-title">Data Ruangan Terhadap User</h5>
              
               
                             

                <div class="table-responsive">
                        <table class="table table-bordered" id="globalTable">
                        <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Ruangan</th>
                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $user)
                                        <tr>
                                            <th scope="row" style="text-align: center">
                                                {{ ++$no}}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @foreach($user->ruangans as $ruangan)
                                                    {{ $ruangan->nama_ruangan }} 
                                                    <form method="POST" action="{{ route('user.hapus-ruangan-user', ['userId' => $user->id, 'ruanganId' => $ruangan->id]) }}" 
                                                    style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                    </form>
                                                   <br>
                                                @endforeach
                                            </td>
                                            
                                            <td class="text-center">
                                            <a href="{{ route('user.tambah-ruangan-form', $user->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bx bxs-pencil"></i>
                                                    </a>
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

