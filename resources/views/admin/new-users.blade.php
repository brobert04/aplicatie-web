@extends('admin.layouts.layout-dashboard')
@section('title', 'Adăugare Utilizator Nou')
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Adaugă utilizator nou</h3>
        </div>
        <form method="POST" action="{{route('users.create')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nume</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nume și prenume" value="{{old('name')}}">
                    @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{old('email')}}">
                    @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="phone_number">Număr de telefon</label>
                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Număr de telefon" value="{{old('phone_number')}}">
                    @error('phone_number') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="address">Adresă</label>
                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Adresă" value="{{old('address')}}">
                    @error('address') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Poză de Profil</label>
                    <div class="preview-image">
                        <img id="photo_preview" src="" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" id="profile_photo" name="profile_photo" onchange="previewImage(event)">
                            <label class="custom-file-label" for="profile_photo">Choose file</label>
                        </div>
                    </div>
                    @error('profile_photo') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="role">Rol</label>
                    <select class="form-control" name="role" value="{{ old('role')}}">
                        <option value="admin">Administrator</option>
                        <option value="autor">Autor</option>
                        <option value="editor">Editor</option>
                    </select>
                    @error('role') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="password">Parolă</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Parolă">
                    @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmare Parolă</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirmare Parolă">
                    @error('password_confirmation') <span class="text-danger small">{{$message}} </span>@enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Creează</button>
                <a href="{{route('users')}}" class="btn btn-danger float-end">Anulează</a>
            </div>
        </form>
    </div>
@endsection
@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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

