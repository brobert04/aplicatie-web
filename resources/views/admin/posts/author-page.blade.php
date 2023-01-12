@extends('frontend_views.template')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-4  mb-5 mb-sm-2">
        <div class="author-box border p-5">
          <div class="text-center">
            <img src="{{ asset('../images/users/' . $user->profile_picture) }}" alt="news" class="img-lg img-fluid img-rounded mb-3">
            <p class="fs-12 m-0">Of the Author</p>
            <h5 class="mb-2 font-weight-medium">{{ $user->name }}</h5>
            <a href="{{ route('user.profile') }}">
                @if($user->id == auth()->user()->id)
                <i class="fa-solid fa-pen"></i>
                @endif
            </a>
            <p class="text-muted text-center" style="text-transform: capitalize">{{$user->role}}</p>
            {{-- <ul class="social-media justify-content-center p-0 mt-3 mb-4">
              <li>
                <a href="#">
                  <i class="mdi mdi-instagram"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-youtube"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-linkedin"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="mdi mdi-twitter"></i>
                </a>
              </li>
            </ul> --}}
          </div>
          <p>
            Odit ut quidem impedit sequi autem ut. Consequatur vel nesciunt
            ut perspiciatis omnis praesentium eos.
          </p>
          <p>
            Consequatur maiores laboriosam consequatur ea minus corrupti
            perspiciatis illum. Molestiae perspiciatis ea iste eaque ea
            sunt. Quae et maiores veritatis cumque facere dolores.
          </p>
        </div>
      </div>
      <div class="col-lg-8  mb-5 mb-sm-2">
        <div class="row" style="justify-content: center">
            @if($posts->count()>0)
            @foreach ( $posts as $post )
            <div class="col-sm-6  mt-3 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img src="{{ asset('../images/posts/'.$post->photo) }}" class="img-fluid" alt="world-news">
                  <span class="thumb-title">{{ $post->user_id }}</span>
                </div>
                <h5 class="font-weight-600 mt-2">
                  {{ $post->title }}
                </h5>
                <p class="fs-15 font-weight-normal">
                  {{ $post->subtitle }}
                </p>
                <a href="#" class="font-weight-bold text-dark pt-2">Read Article</a>
              </div>
            @endforeach
            @else
            <div class="bg-light border-radius-6 px-4 py-3 mt-4" style="text-align:center;">
                <i style="color:black; font-weight: bold; font-size: 35px;"class="fa-solid fa-exclamation"></i>
                <p class="text-dark font-weight-bold">
                    Utilizatorul {{ $user->name }} nu a postat nimic momentan.
                </p>
              </div>
            @endif
        </div>
      </div>
    </div>
@endsection