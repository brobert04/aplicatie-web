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
                <div class="card mb-4">
                    <div class="card-header">
                        Utilizatori înregistrați - {{$users->count() }}
                        <a href="{{route('users.name')}}" class=" float-end ">Adaugă Utilizatori</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
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
                                    <td style="text-transform: capitalize">{{$user->role}}</td>
                                    <td class="text-center">
                                        <a href="{{route('users.edit-form', $user->id)}}" class="butoane text-success" title="Editează utilizator"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                        &nbsp;
                                        <form id="delete-form-{{$user->id}}" action="{{route('users.delete', $user->id)}}" method="post" style="display:inline-block;">
                                            @csrf
                                        </form>

                                        <a href="{{route('users.delete', $user->id)}}" class="butoane text-danger" title="Șterge utilizator" onClick="deleteItem({{$user->id}}, {{$user->name}})"><i class="fa-sharp fa-xl fa-solid fa-trash"></i></a>
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
    <script>
        function deleteItem(id, name){
            if(confirm(`Sunteți sigur că doriți să ștergeți utilizatorul ${name}?`)){
                document.getElementById('delete-form-'+id).submit();
            }
        }
    </script>
