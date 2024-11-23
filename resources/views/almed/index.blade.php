@extends('layouts.aplikasi')

@section('konten')

    <div class="pagetitle">
      <h1>Data Master Alat Medis</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Alat Medis</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data Master</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Alat Medis</h5>
              
               
                                <div class="input-group mb-3">
                                    
                                        <div class="input-group-prepend">
                                            <a href="{{ route('almed.create') }}" class="btn btn-primary"
                                                style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                        </div>
                                    
                                
                                </div>
                  

                <div class="table-responsive">
                        <table class="table table-bordered" id="globalTable">
                        <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                        <th scope="col">Nama Alat Medis</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($almeds as $no => $alm)
                                        <tr>
                                            <th scope="row" style="text-align: center">
                                                {{ ++$no}}</th>
                                            <td>{{ $alm->nama_almed}}</td>
                                            <td>{{ $alm->keterangan }}</td>
                                            
                                            <td class="text-center">
                                                @can('almed.edit')
                                                    <a href="{{ route('almed.edit', $alm->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bx bxs-pencil"></i>
                                                    </a>
                                                @endcan

                                                @can('almed.delete')
                                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                                        id="{{ $alm->id }}">
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

