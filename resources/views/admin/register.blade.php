@extends('admin.layouts.layout-formulare')
@section('content')
    <main class="main-content  mt-0">
      <section>
        <div class="page-header min-vh-75">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                  <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-dark">Bine ai venit!</h3>
                    <p class="mb-0">Pentru a putea continua, te rugăm să-ți creezi un cont folosind formularul de mai jos :)</p>
                  </div>
                  <div class="card-body">
                    <form role="form text-left">
                      <div class="mb-3">
                        <label>Nume</label>
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon">
                      </div>
                      <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                      </div>
                      <div class="mb-3">
                        <label>Parolă</label>
                        <input type="password" class="form-control" placeholder="Parolă" aria-label="Password" aria-describedby="password-addon">
                      </div>
                      <div class="form-check form-check-info text-left">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                          Sunt de acord cu <a href="javascript:;" class="text-dark font-weight-bolder">Termenii și condițille</a>
                        </label>
                      </div>
                      <div class="text-center">
                        <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Înregistrare</button>
                      </div>
                      <p class="text-sm mt-3 mb-0">Ai deja cont?<a href="{{ route('login') }}" class="text-dark font-weight-bolder">  Folosește-l</a></p>
                    </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    @error('email')<span class="text-danger sm">{{ $message }}@enderror
                    @error('password')<span class="text-danger sm">{{ $message }}@enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                  <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{ asset('../admin/img/curved-images/curved5.jpg') }}')"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    {{-- <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Team
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Products
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Pricing
            </a>
          </div>
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Soft by Creative Tim.
            </p>
          </div>
        </div>
      </div>
    </footer> --}}
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
@endsection