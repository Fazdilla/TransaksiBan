@extends('layouts.aplikasi')

@section('konten')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="pagetitle">
      <h1>Data Master Ban</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">PT PUTRA UTAMA ANDA</a></li>
          <li class="breadcrumb-item">Tabel</li>
          <li class="breadcrumb-item active">Data Stok</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Stok</h5>

                <div class="table-responsive">
                  <table class="table table-bordered mt-5" id="globalTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Seri Diterima</th>
                            <th>Nomor Seri Surat Jalan</th>
                            <th>Ukuran</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Nopol</th>
                            <th>Kapasitas</th>
                            <th>Tanggal Pemakaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datastok as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nomor_seri_diterima }}</td>
                                <td>{{ $item->nomor_seri_surat_jalan }}</td>
                                <td>{{ $item->ukuran }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->nopol }}</td>
                                <td>{{ $item->kapasitas }}</td>
                                {{-- <td>{{ $item->tanggal_pemakaian }}</td> --}}
                                <td>
                                  @if($item->tanggal_pemakaian)
                                      {{ \Carbon\Carbon::parse($item->tanggal_pemakaian)->locale('id')->translatedFormat('d F Y') }}
                                  @else
                                      READY STOK
                                  @endif
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
@endsection
 


