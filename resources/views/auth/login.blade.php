@extends('layouts.app')


@section('konten')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4 mt-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        {{-- <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/PUA.png" alt="">
                  <span class="d-none d-lg-block">Emme Care</span>
                </a>
              </div> --}}
                        <!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <div class="d-flex justify-content-center py-1" style="width: 400px;">
                                        <span class="logo d-flex align-items-center w-50 justify-content-center">
                                            <img src="assets/img/pua.jpeg" alt="" class="img-fluid">
                                        </span>
                                    </div>

                                    <div class="pb-2 pt-0 ">
                                        <h5 class="card-title text-center pb-0 fs-4">Login ke Akun Anda</h5>
                                        <p class="text-center small">Isi form di bawah ini</p>
                                    </div>

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif

                                    <form class="row g-3 needs-validation" novalidate action="{{ route('login') }}"
                                        method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="name@example.com" required>
                                                <div class="invalid-feedback">Mohon isikan email Anda.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required>
                                            <div class="invalid-feedback">Mohon isikan password anda!</div>
                                        </div>


                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        {{-- <div class="col-12">
                                            <p class="small mb-0">Tidak punya akun? <a href="{{ route('register') }}">Buat
                                                    akun</a></p>
                                        </div> --}}
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                               
                            </div>

                        </div>
                    </div>
                </div>

        </section>

    </div>
@endsection
