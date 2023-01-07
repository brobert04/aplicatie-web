@extends('admin.layouts.layout-dashboard')
@section('title', 'Editare Categorie - '. $category->title)
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Editează categoria <span class="text-warning fst-italic" >{{$category->title}}</span></h3>

        </div>
        <form method="POST" action="{{route('categories.edit', $category->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Nume categorie</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Nume categorie" value="{{old('title') ? old('title') : $category->title}}">
                    @error('title') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="text">Subtitlu</label>
                    <input name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" placeholder="Subtitlu" value="{{old('subtitle') ? old('subtitle') : $category->subtitle}}">
                    @error('subtitle') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control @error('phone_number') is-invalid @enderror" id="slug" placeholder="Slug" value="{{old('slug') ? old('slug') : $category->slug}}">
                    @error('slug') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="excerpt">Descriere</label>
                    <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt">
                        {{old('excerpt') ? old('excerpt') : $category->excerpt}}
                    </textarea>
                    @error('excerpt') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="order">Ordine</label>
                    <input name="order" type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Ordine de afișare" value="{{old('order')}}">
                    @error('order') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Poză</label>
                    <div class="preview-image">
                        <img id="photo_preview" src="{{'/images/categories/' . $category->photo}}" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" id="photo" name="photo" onchange="previewImage(event)">
                            <label class="custom-file-label" for="profile_photo">Choose file</label>
                        </div>
                    </div>
                    @error('photo') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <button type="button" class="butoane text-primary dropdown-toggle mt-3" id="more_btn">
                    Mai mult
                </button>
                <div class="row bg-light p-3" id="more" hidden>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input id="meta_title" name="meta_title" type="text" class="form-control" placeholder="Enter ..." value="{{old('meta_title') ? old('meta_title') : $category->meta_title}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <input id="meta_description" name="meta_description" type="text" class="form-control" placeholder="Enter ..." value="{{old('meta_description') ? old('meta_description') : $category->meta_description}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input name="meta_keywords" id="meta_keywords" type="text" class="form-control" placeholder="Enter ..." value="{{old('meta_keywords') ? old('meta_keywords') : $category->meta_keywords}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Editează</button>
                <a href="{{route('categories')}}" class="btn btn-danger float-end">Anulează</a>
            </div>
        </form>
    </div>
@endsection
@section('custom-css')
    <style>
        .butoane{
            text-decoration: none !important;
            background:none !important;
            border:none !important;
        }
    </style>
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
    <script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'excerpt' );
    </script>
    <script>
        let button = document.getElementById('more_btn');
        let more = document.getElementById('more');
        button.addEventListener('click', function () {
            more.hidden = !more.hidden;
        });
    </script>
    <script>
        $('#title').on('blur',function(){
            var theTitle=this.value.toLowerCase().trim(),
                slugInput=$('#slug'),
                theSlug=theTitle.replace(/&/g,'-and-')
                    .replace(/[^a-z0-9-]+/g,'-')
                    .replace(/\-\-+/g,'-')
                    .replace(/^-+|-+$/g,'');

            slugInput.val(theSlug);
        });
    </script>
@endsection


