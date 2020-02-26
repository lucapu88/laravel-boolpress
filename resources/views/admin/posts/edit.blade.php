@extends('layouts.admin')
@section('content')
  <div class="container backgroundEdit">
    <div class="row">
      <div class="col-sm-12">
        <h1>Modifica post</h1>
        {{-- <small>* = campi obbligatori</small> --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="post" action="{{route('admin.posts.update', ['post'=> $post->id])}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name='title' id="title" placeholder="Titolo*" value="{{old('title',$post->title)}}">
          </div>
          <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name='author' id="author" placeholder="Autore*" value="{{old('author',$post->author)}}">
          </div>
          <div class="form-group">
            <label for="content">Ingredienti</label>
            <textarea class="form-control" id="content" name="content" rows="10">{{old('content',$post->content)}}</textarea>
          </div>
          <div class="form-group">
            <label for="img">Immagine di copertina</label>
            @if ($post->img)
              <img class="img-fluid imgEdit" src="{{asset('storage/' . $post->img)}}" alt="foto:{{$post->title}}">
            @endif
            <input type="file" class="form-control" name='img_file' id="img">
          </div>
          <p>Categoria:</p>
          <select class="custom-select col-sm-3" name="category_id">
          @if ($categories->count() > 0)
            <option value="">Seleziona la categoria</option>
            @foreach ($categories as $category) {{-- se il post ha una categoria e l'id della categoria è uguale all'id della categoria che sto disegnando, stampo selected, altrimenti non stampo niente --}}
               <option
                 @if (!empty(old('category_id')))
                   {{old('category_id') == $category->id ? 'selected' : ''}}
                 @else
                    {{$post->category && $post->category->id == $category->id ? 'selected' : ''}}
                  @endif
                    value="{{$category->id}}">
                    {{$category->name}}</option>
            @endforeach
          @endif
          </select>
          @if ($tags->count() > 0)
            <p>Seleziona tag per questo post: </p>
            @foreach ($tags as $tag)
              <label for='tag_{{$tag->id}}'>
                <input id="tag_{{$tag->id}}"
                @if ($errors->any())
                  {{in_array($tag->id, old('tag_id', array())) ? 'checked' : ''}}
                @else
                  {{$post->tags->contains($tag) ? 'checked' : ''}}
                @endif
                  type="checkbox" name="tag_id[]" value="{{$tag->id}}">
                {{$tag->name}}
              </label>
            @endforeach
          @endif
          <button type="submit" class="btn btn-primary">Aggiorna Modifiche</button>
        </form>
      </div>
    </div>
  </div>

@endsection
