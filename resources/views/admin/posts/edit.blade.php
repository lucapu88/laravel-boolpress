@extends('layouts.admin')
@section('content')
  <div class="container backgroundEdit">
    <div class="row">
      <div class="col-sm-12">
        <h1>Modifica post</h1>
        {{-- <small>* = campi obbligatori</small> --}}
        <form method="post" action="{{route('admin.posts.update', ['post'=> $post->id])}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name='title' id="title" placeholder="Titolo*" value="{{$post->title}}" required>
          </div>
          <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name='author' id="author" placeholder="Autore*" value="{{$post->author}}" required>
          </div>
          <div class="form-group">
            <label for="content">Ingredienti</label>
            <textarea class="form-control" id="content" name="content" rows="10">{{$post->content}}</textarea>
          </div>
          <div class="form-group">
            <label for="img">Immagine di copertina</label>
            @if ($post->img)
              <img class="img-fluid" src="{{asset('storage/' . $post->img)}}" alt="foto:{{$post->title}}">
            @endif
            <input type="file" class="form-control" name='img_file' id="img">
          </div>
          <p>Categoria:</p>
          <select class="custom-select col-sm-3" name="category_id">
            <option value="">Seleziona la categoria</option>
            @foreach ($categories as $category) {{-- se il post ha una categoria e l'id della categoria è uguale all'id della categoria che sto disegnando, stampo selected, altrimenti non stampo niente --}}
               <option value="{{$category->id}}" {{$post->category && $post->category->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-primary">Aggiorna Modifiche</button>
        </form>
      </div>
    </div>
  </div>

@endsection
