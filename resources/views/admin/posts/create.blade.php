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
            <label for="img">Immagine di copertina</label>
            <input type="file" class="form-control" name='img' id="img">
          </div>
          <button type="submit" class="btn btn-success">Inserisci</button>
        </form>
      </div>
    </div>
  </div>

@endsection
