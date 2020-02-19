@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Creazione nuovo post</h1>
        <small>* = campi obbligatori</small>
        <form method="post" action="{{route('admin.posts.update', ['post'=> $post->id])}}">
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
          <button type="submit" class="btn btn-outline-primary">Aggiorna Modifiche</button>
        </form>
      </div>
    </div>
  </div>

@endsection
