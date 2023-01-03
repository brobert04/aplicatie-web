@extends('admin.layouts.layout-dashboard')
@section('title', 'Gestionare Categorii')
@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Panou Control</a></li>
        <li class="breadcrumb-item active">Categorii</li>
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
            Categorii - {{$categories->count() }}
            <a href="{{route('categories.new')}}" class=" float-end ">Adaugă Categorii</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th class="text-center">Titlu</th>
                    <th class="text-center">Subtitlu</th>
                    <th class="text-center">Vizualizări</th>
                    <th class="text-center">Fotografie</th>
                    <th class="text-center">Meta Description & Meta Keywords</th>
                    <th class="text-center">Acțiuni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $c)
                    <tr>
                        <td>
                            {{$c->title}}
                        </td>
                        <td>
                            {{$c->subtitle}}
                        </td>
                        <td>
                            {{$c->views}}
                        </td>
                        <td class="text-center">
                            <img class="user-avatar"
                                 src="../images/categories/{{ $c->photo }}" alt="No photo">
                        </td>
                        <td>
                            {{$c->meta_description}}
                            <br>
                            <span class="badge bg-primary">{{$c->meta_keywords}}</span>
                        <td class="text-center">
                            <a href="{{route('categories.edit-form',
                            $c->id)}}" class="butoane text-success" title="Editează categorie"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                            &nbsp;
                            <form id="delete-form-{{$c->id}}" action="" method="post" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="butoane text-danger" title="Șterge categorie" onclick="if(confirm('Confirmați ștergerea utilizatorului {{$c->name}}?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-'+{{$c->id}}).submit();}
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
