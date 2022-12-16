@extends('admin.layouts.layout-dashboard')
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Adaugă utilizator nou</h3>
        </div>
        <form method="POST" action="{{route('users.create')}}" >
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
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role">Rol</label>
                    <select class="form-control" name="role" value="{{ old('address')}}">
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
