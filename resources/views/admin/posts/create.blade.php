@extends('layouts.admin')
@section('content')

  <div class="container backgroundIMG">
    <div class="row">
      <div class="col-sm-12">
        <h1>Creazione nuovo post</h1>
        <small>* = campi obbligatori</small>
        <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Titolo*</label>
            <input type="text" class="form-control" name='title' id="title"  placeholder="Titolo" required>
          </div>
          <div class="form-group">
            <label for="author">Autore*</label>
            <input type="text" class="form-control" name='author' id="author" placeholder="Autore" required>
          </div>
          <div class="form-group">
            <label for="content">Ingredienti*</label>
            <textarea class="form-control" id="content" placeholder="Inserisci gli ingredienti della tua ricetta" name="content" rows="10" required></textarea>
          </div>
          <div class="form-group">
            <label for="img">Immagine di copertina*</label>
            <input type="file" class="form-control" name='img_file' id="img" required>
          </div>
          <p>Categoria:</p>
          <select class="custom-select col-sm-3" name="category_id">
            <option value="">Seleziona la categoria</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          @if ($tags->count() > 0)
            <p>Seleziona tag per questo post: </p>
            @foreach ($tags as $tag)
              <label for='tag_{{$tag->id}}'>
                <input id="tag_{{$tag->id}}" type="checkbox" name="tag_id[]" value="{{$tag->id}}">
                {{$tag->name}}
              </label>
            @endforeach
          @endif
          <button type="submit" class="btn btn-success offset-sm-1 btn-lg">Inserisci</button>
        </form>
      </div>
    </div>
  </div>

@endsection
