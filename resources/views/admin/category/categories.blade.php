@extends('admin.layouts.layout-dashboard')
@section('title', 'Gestionare Utilizatori')
@section('content')
<div class="card">
    <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#featured" data-bs-toggle="tab">Recomandate</a></li>
            <li class="nav-item"><a class="nav-link" href="#all" data-bs-toggle="tab">Toate Categoriile</a></li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                <div class="row">
                    @foreach($categories as $k)
                        @continue($loop->index == 1)
                        <div class="col-lg-3 col-4" >
                            <div class="card">
                                <a href="#">
                                    <img class="card-img-top" src="../images/categories/{{$k->photo}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark" style="font-weight: bold;font-size: 1.4rem;">{{$k->title}}</h5>
                                        <h5 class="card-title text-muted mb-3" style="font-weight: bold;font-size: 1rem;">{{$k->subtitle}}</h5>
                                        <p class="card-text text-dark">{{$k->excerpt}}</p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                <i class="fas fa-eye"></i>{{$k->views}}
                                               </small>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                <i class="fas fa-tag"></i> {{$k->meta_keywords}}
                                            </small>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @break($loop->index == 4)
                    @endforeach
                </div>
            </div>

            <div class="tab-pane" id="all"  data-bs-toggle="tab" aria-labelledby="all-tab">
                <div class="card mb-4">
                    <div class="card-header">
                        Categorii - {{$categories->count() }}
                        <a href="{{route('categories.new')}}" class=" float-end ">Adaugă Categorii</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th class="text-center">Titlu - Slug</th>
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
                                        {{$c->title}} - {{$c->slug}}
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
                                        <a href="" class="butoane text-success" title="Editează utilizator"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                        &nbsp;
                                        <form id="delete-form-{{$c->id}}" action="" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button class="butoane text-danger" title="Șterge utilizator" onclick="if(confirm('Confirmați ștergerea utilizatorului {{$c->name}}?')){
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
            </div>
        </div>

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
@endsection
