<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href=" {{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css ')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css ')}}" rel="stylesheet">
    <link href=" {{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.1/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Template Main CSS File -->
    <link href=" {{asset('assets/css/style.css')}}" rel="stylesheet">
    
    <!-- jQuery first, then Select2 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body class="antialiased d-flex flex-column min-vh-100">
        @include('layouts/header')
        @include('layouts/sidebar')
        <main id="main" class="main">
            @yield('konten')
        </main>
        @include('layouts/footer')

   
            

<!-- Vendor JS Files -->

<script src=" {{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="  {{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src=" {{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src=" {{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
<script src=" {{asset('assets/vendor/quill/quill.min.js')}}"></script>
<script src=" {{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src=" {{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src=" {{asset('assets/vendor/php-email-form/validate.js')}}"></script>
<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>

 <!-- start - This is for export functionality only -->
 <!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
   
    
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.print.min.js"></script>
   <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <!-- end - This is for export functionality only -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    {{-- <script>
        window.addEventListener('success', event => {
            Swal.fire(
                'Selamat!',
                'Data Berhasil Ditambahkan!',
                'success'
            )
        });

        window.addEventListener('info', event => {
            Swal.fire(
                'Selamat!',
                'Data Berhasil Diubah!',
                'success'
            )
        });

        window.addEventListener('danger', event => {
            Swal.fire(
                'Selamat!',
                'Data Berhasil Dihapus!',
                'success'
            )
        });

        window.addEventListener('gagal', event => {
            Swal.fire(
                'Maaf!',
                'Data Tidak berhasil Disimpan!',
                'error'
            )
        });
    </script> --}}
    <script>
        @if (session()->has('success'))
            swal({
                type: "success",
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                timer: 1500,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
        @elseif (session()->has('error'))
            swal({
                type: "error",
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                timer: 1500,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
        @endif
        </script>


        
@stack('scripts')
</body>
</html>
