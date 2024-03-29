@extends('admin.layouts.layout-dashboard')
@section('title', 'Gestionare Utilizatori')
@section('content')
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Panou Control</a></li>
                    <li class="breadcrumb-item active">Utilizatori</li>
                </ol>
                @if(session()->has('success'))
                    <div class="alert alert-success" id="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" id="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        Utilizatori înregistrați - {{$users->count() }}
                        <a href="{{route('users.name')}}" class=" float-end ">Adaugă Utilizatori</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Email Validat</th>
                                <th>Nume</th>
                                <th>Email</th>
                                <th>Adresă și număr de telefon</th>
                                <th class="text-center">Fotografie de Profil</th>
                                <th>Funcție</th>
                                <th>Acțiuni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center font-weight-bold">
                                        @if($user->hasVerifiedEmail())
                                            <span style="color:green;"><i class="fa-solid fa-check"></i></span>
                                        @else
                                            <span style="color:red;"><i class="fa-solid fa-minus-circle"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$user->name}}
                                        <br>
                                        <span class="under-info">{{$user->created_at->format('D, j M - Y')}}</span>
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        {{$user->address}}
                                        <br>
                                        <span class="under-info">{{$user->phone}}</span>
                                    </td>
                                    <td class="text-center">
                                        <img class="user-avatar" src="../images/users/{{$user->profile_picture}}">
                                    </td>
                                    <td style="text-transform: capitalize">
                                        @if($user->role == 'autor')
                                        <a href="{{ route('admin.posts', ['autor'=> $user->id]) }}">{{$user->role}}</a>
                                        @else
                                        {{ $user->role }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('users.edit-form', $user->id)}}" class="butoane text-success" title="Editează utilizator"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                        &nbsp;
                                        <form id="delete-form-{{$user->id}}" action="{{route('users.delete', $user->id)}}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button class="butoane text-danger" title="Șterge utilizator" onclick="if(confirm('Confirmați ștergerea utilizatorului {{$user->name}}?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-'+{{$user->id}}).submit();}
                                            "><i class="fa-sharp fa-xl fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection

@section('custom-css')
    <style>
        .butoane{
            text-decoration: none !important;
            background:none !important;
            border:none !important;
        }
        .user-avatar{
            max-height: 50px;
            max-width: 50px;
        }
        .under-info{
            font-style: italic;
            color: gray;
        }
    </style>
@endsection
@section('custom-js')
    <script>
        setTimeout(()=>{
            document.getElementById('alert').style.display = 'none';
        }, 3000);
    </script>
@endsection
