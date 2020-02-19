@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Creazione nuovo post</h1>
        <small>* = campi obbligatori</small>
        <form method="post" action="{{route('admin.posts.store')}}">
          @csrf
          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name='title' id="title"  placeholder="Titolo*" required>
          </div>
          <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name='author' id="author" placeholder="Autore*" required>
          </div>
          <div class="form-group">
            <label for="content">Ingredienti</label>
            <textarea class="form-control" id="content" placeholder="Inserisci gli ingredienti della tua ricetta*" name="content" rows="10" required></textarea>
          </div>
          <button type="submit" class="btn btn-outline-success">Inserisci</button>
        </form>
      </div>
    </div>
  </div>

@endsection
