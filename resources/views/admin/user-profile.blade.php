@extends('admin.layouts.layout-dashboard')
@section('custom-css')
    <style>
        #delete-profile:hover {
            color: red;
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-dark card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="/images/users/{{$user->profile_picture}}" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">
                                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                                               aria-expanded="false">{{auth()->user()->name}} </a>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" id="change-button" style="cursor:pointer;">
                                                        Schimbă parola
                                                    </a></li>
                                                <li>
                                                    <hr class="dropdown-divider"/>
                                                </li>
                                                <li><a class="dropdown-item" id="delete-profile" style="cursor:pointer;">
                                                        Șterge profilul
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </h3>
                                <p class="text-muted text-center" style="text-transform: capitalize">{{$user->role}}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Adresă</b><a class="float-right" style="font-size:15px;">{{$user->address}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Număr de telefon</b> <a class="float-right">{{$user->phone}}</a>
                                    </li>
                                </ul>
                                <div style="margin-bottom: 40px" hidden id="space"></div>
                                <div class="form-group" id="password-input1" hidden>
                                    <label for="actual-password">Parola actuală</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Parolă actuală">
                                    @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group" id="password-input2" hidden>
                                    <label for="new-password">Parola nouă</label>
                                    <input type="password" class="form-control @error('password-new') is-invalid @enderror" name="password" id="password" placeholder="Parolă nouă">
                                    @error('password-new') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group" id="password-input3" hidden>
                                    <label for="password_confirmation">Confirmare Parolă</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirmare Parolă">
                                    @error('password_confirmation') <span class="text-danger small">{{$message}} </span>@enderror
                                </div>
                                <button id="change" class="btn btn-dark btn-block" hidden>Schimbă parola</button>
                                @if(session()->has('success'))
                                    <div class="alert alert-success mt-3" id="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-danger mt-3" id="alert">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-dark">
                            <div class="card-header p-3">
                                <h3 class="card-title">Editează-ți datele</h3>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="settings">
                                        <form method="POST" action="{{route('users.edit-profile', $user->id)}}" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Nume</label>
                                                <div class="col-sm-10">
                                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nume și prenume" value="{{$user->name}}">
                                                    @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{$user->email}}">
                                                    @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_number" class="col-sm-2 col-form-label">Număr de telefon</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Număr de telefon" value="{{$user->phone}}">
                                                    @error('phone_number') <span class="text-danger small">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Adresă</label>
                                                <div class="col-sm-10">
                                                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Adresă" value="{{$user->address}}">
                                                    @error('address') <span class="text-danger small">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Poza de profil</label>
                                                <div class="col-sm-10">
                                                    <div class="preview-image">
                                                        <img id="photo_preview" src="{{'/images/users/' . $user->profile_picture}}" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" accept="image/*" class="custom-file-input" id="profile_photo" name="profile_photo" onchange="previewImage(event)">
                                                        <label class="custom-file-label" for="profile_photo">Alege imaginea</label>
                                                    </div>
                                                    @error('profile_photo') <span class="text-danger small">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-dark">Editează</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
    <script>
        const previewImage = (event) => {
            const imageFiles = event.target.files;
            const imageFilesLength = imageFiles.length;
            if (imageFilesLength > 0) {
                const imageSrc = URL.createObjectURL(imageFiles[0]);
                const imagePreviewElement = document.querySelector("#photo_preview");
                imagePreviewElement.src = imageSrc;

            }
        };
    </script>
    <script>
        setTimeout(()=>{
            document.getElementById('alert').style.display = 'none';
        }, 3000);
    </script>
    <script>
        let button = document.getElementById('change-button');
        let changeBtn = document.getElementById('change');
        let inputOne = document.getElementById('password-input1');
        let inputTwo = document.getElementById('password-input2');
        let inputThree = document.getElementById('password-input3');
        let space = document.getElementById('space');
        button.addEventListener('click', function(){
            inputOne.removeAttribute('hidden');
            inputTwo.removeAttribute('hidden');
            changeBtn.removeAttribute('hidden');
            space.removeAttribute('hidden');
            inputThree.removeAttribute('hidden');
        })
    </script>
@endsection



