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
            @can('author-rights')<a href="{{route('categories.new')}}" class=" float-end ">Adaugă Categorii</a>@endcan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th class="text-center">Public</th>
                    <th class="text-center">Titlu</th>
                    <th class="text-center">Vizualizări</th>
                    <th class="text-center">Fotografie</th>
                    <th class="text-center">Meta Description & Meta Keywords</th>
                    @can('author-rights')
                    <th class="text-center">Acțiuni</th>
                        @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $c)
                    <tr>
                        <td class="text-center font-weight-bold">
                            @if($c->publish == 1)
                                <span style="color:green;"><i class="fa-solid fa-check"></i></span>
                            @else
                                <span style="color:red;"><i class="fa-solid fa-minus-circle"></i></span>
                            @endif
                        </td>
                        <td style="font-weight:bold;">
                            {{$c->title}}
                            <p class="text-warning" style="font-size: 12px;">{{$c->subtitle}}</p>
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
                            <span id="keywords" class="badge bg-primary">{{$c->meta_keywords}}</span>
                        @can('author-rights')
                        <td class="text-center">
                            <a href="{{route('categories.edit-form',
                            $c->id)}}" class="butoane text-success" title="Editează categorie"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                            @endcan
                            @can('author-rights')
                            <form id="delete-form-{{$c->id}}" action="{{route('categories.delete', $c->id)}}" method="post" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="butoane text-danger" title="Șterge categorie" onclick="if(confirm('Confirmați ștergerea categoriei {{$c->title}}?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-'+{{$c->id}}).submit();}
                                            "><i class="fa-sharp fa-xl fa-solid fa-trash"></i></button>
                            @endcan
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
