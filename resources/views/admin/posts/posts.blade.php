        @extends('admin.layouts.layout-dashboard')
        @section('title', 'Gestionare Postări')
        @section('content')
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Panou Control</a></li>
                <li class="breadcrumb-item active">Postări</li>
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
                    Postări - {{$posts->count() }}
                    @can('author-rights')<a href="" class=" float-end ">Adaugă Postare</a>@endcan
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titlu</th>
                                <th>Autor</th>
                                <th>Thumbnail</th>
                                <th>Vizualizări</th>
                                <th>Meta Description & Meta Keywords</th>
                                <th>Acțiuni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                        <tr>
                            <td>{{ $post->title }} <br> <span class="under-info">{{ $post->created_at->format('F j, Y') }}</span></td>
                            <td><a href="{{ route('admin.posts', ['autor'=> $post->user->id]) }}">{{ $post->user->name }}</a>
                                <br>
                                <span class="under-info">{{ $post->user->posts->count() }} postări</span>
                            </td>
                            <td><img style="max-width: 100px; max-height: 100px"class="img-thumbnail" src="{{ asset('../images/posts/' .$post->photo) }}"></td>
                            <td>{{ $post->views }}</td>
                            <td>
                                {{$post->meta_description}}
                                <br>
                                <span id="keywords" class="badge bg-primary">{{$post->meta_keywords}}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{route('users.edit-form', $post->id)}}" class="butoane text-success" title="Editează utilizator"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                &nbsp;
                                <form id="delete-form-{{$post->id}}" action="{{route('users.delete', $post->id)}}" method="post" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="butoane text-danger" title="Șterge postare" onclick="if(confirm('Confirmați ștergerea postării {{$post->title}}?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-'+{{$post->id}}).submit();}
                                    "><i class="fa-sharp fa-xl fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            {{ $posts->links() }}
                        </tfoot>
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
                    color: gray;
                    font-size: 12px;
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
