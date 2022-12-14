@extends('admin.layouts.layout-dashboard')
@section('title', 'Gestionare Utilizatori')
@section('content')
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Panou Control</a></li>
                    <li class="breadcrumb-item active">Utilizatori</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        Utilizatori înregistrați - {{$users->count() }}
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Nume</th>
                                <th>Email</th>
                                <th>Creat la</th>
                                <th>Acțiuni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td class="text-center">
                                        <a href="" class="butoane text-success" title="Editează utilizator"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                        &nbsp;
                                        <a href="" class="butoane text-danger" title="Șterge utilizator"><i class="fa-sharp fa-xl fa-solid fa-trash"></i></a>
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
    </style>
@endsection
