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
                    <form role="form text-left" method="POST" action="{{ route('register') }}">
                      @csrf
                      <div class="mb-3">
                        <label>Nume</label>
                        <input name="name" type="text" class="form-control" placeholder="Nume" aria-label="Name" aria-describedby="email-addon">
                      </div>
                      <div class="mb-3">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                      </div>
                      <div class="mb-3">
                        <label>Parolă</label>
                        <input name="password" type="password" class="form-control" placeholder="Parolă" aria-label="Password" aria-describedby="password-addon">
                      </div>
                      <div class="mb-3">
                        <label>Confirmă Parolă</label>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirmă Parola" aria-label="Password" aria-describedby="password-addon"
                        for="password_confirmation">
                      </div>
                      <div class="form-check form-check-info text-left">
                        <input name="remember" class="form-check-input" type="checkbox" id="rememberMe" checked="">
                        <label class="form-check-label" for="rememberMe">Nu mă uita :)</label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Înregistrare</button>
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
  </main>
@endsection