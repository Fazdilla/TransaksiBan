@extends('layouts.aplikasi')

@section('konten')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <!-- Welcome Card -->
            <div class="col-12">
              <div class="card info-card">
                <div class="card-body">
                  <h5 class="card-title">Selamat Datang di Sistem Manajemen Ban</h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>PT PUTRA UTAMA ANDA</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Features Section -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Fitur Utama</h5>
                  
                  <div class="row">
                    <!-- Master Ban -->
                    <div class="col-xxl-3 col-md-6">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">Master Ban</h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-gear-fill"></i>
                            </div>
                            <div class="ps-3">
                              <p>Manajemen data master ban</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Pemakaian Ban -->
                    <div class="col-xxl-3 col-md-6">
                      <div class="card info-card revenue-card">
                        <div class="card-body">
                          <h5 class="card-title">Pemakaian Ban</h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-truck"></i>
                            </div>
                            <div class="ps-3">
                              <p>Pencatatan pemakaian ban</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Lepas Ban -->
                    <div class="col-xxl-3 col-md-6">
                      <div class="card info-card customers-card">
                        <div class="card-body">
                          <h5 class="card-title">Lepas Ban</h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-tools"></i>
                            </div>
                            <div class="ps-3">
                              <p>Pencatatan pelepasan ban</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- OTF Ban -->
                    <div class="col-xxl-3 col-md-6">
                      <div class="card info-card sales-card">
                        <div class="card-body">
                          <h5 class="card-title">OTF Ban</h5>
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div class="ps-3">
                              <p>On The Fly Ban Management</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- About Section -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tentang Aplikasi</h5>
                  <p>Sistem Manajemen Ban adalah aplikasi komprehensif yang dirancang untuk membantu PT PUTRA UTAMA ANDA dalam mengelola dan memantau penggunaan ban kendaraan. Sistem ini mencakup berbagai fitur untuk memastikan efisiensi dan efektivitas dalam pengelolaan ban.</p>
                  
                  <div class="mt-4">
                    <h6>Fitur Utama:</h6>
                    <ul>
                      <li>Pencatatan dan pelacakan ban</li>
                      <li>Manajemen pemakaian ban</li>
                      <li>Pencatatan pelepasan ban</li>
                      <li>Sistem OTF (On The Fly) Ban</li>
                      <li>Manajemen data master</li>
                      <li>Pelaporan dan analisis</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

@endsection
