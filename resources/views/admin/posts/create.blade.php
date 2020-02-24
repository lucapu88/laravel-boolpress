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
          <button type="submit" class="btn btn-success offset-sm-1 btn-lg">Inserisci</button>
        </form>
      </div>
    </div>
  </div>

@endsection
