@extends('layouts.public')
@section('content')
  <div class="container backgroundSingle">
    <div class="row">
      <div class="col-sm-12">
        <div class="card" style="width: 30rem;">
          <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              @if ($post->img)
                <img class="img-fluid" src="{{asset('storage/' . $post->img)}}" alt="foto:{{$post->title}}">
              @endif
              <h6 class="card-subtitle mb-2 text-muted">{{$post->slug}}</h6>
              <p class="card-text"><strong>Descrizione: </strong> {{$post->content}}</p>
              <p class="card-text"><strong>Autore: </strong> {{$post->author}}</p>
              @if (!empty($post->category)) {{--se è assegnata una categoria la mostro altrimenti no --}}
                <p class="card-text"><strong>Categoria: <a href="{{route('blog.category', ['slug' => $post->category->slug])}}">{{$post->category->name}}</a></strong></p>
              @endif
              @if (($post->tags)->isNotEmpty()) {{--se la collection di tag non è vuota li stampa altrimenti no --}}
                <p class="card-text"><strong>Tags:
                  @foreach ($post->tags as $tag)
                    <a href="{{route('blog.tag', ['slug' => $tag->slug])}}">{{$tag->name}}</a>{{$loop->last ? '' : ', '}}
                  @endforeach
                </strong></p>
              @endif
              <p class="card-text"><strong>Creato il: </strong> {{$post->created_at}}</p>
              <p class="card-text"><strong>Aggiornato il: </strong> {{$post->updated_at}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
