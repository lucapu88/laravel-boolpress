@extends('layouts.admin')
@section('content')
  <div class="container showBackground">
    <div class="row">
      <div class="col-sm-12">
        <div class="card mx-auto" style="width: 30rem;">
          <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              @if ($post->img)
                <img class="img-fluid" src="{{asset('storage/' . $post->img)}}" alt="foto:{{$post->title}}">
              @endif
              <h6 class="card-subtitle mb-2 text-muted">{{$post->slug}}</h6>
              <p class="card-text"><strong>Descrizione: </strong> {{$post->content}}</p>
              <p class="card-text"><strong>Autore: </strong> {{$post->author}}</p>
              <p class="card-text"><strong>Categoria: </strong> {{$post->category ? $post->category->name : ' ----- '}}</p>
              <p class="card-text"><strong>Tags: </strong>
                @forelse ($post->tags as $tag)
                {{$tag->name}}{{$loop->last ? '' : ', '}}
                @empty
                  ----
                @endforelse
              </p>
              <p class="card-text"><strong>Creato il: </strong> {{$post->created_at}}</p>
              <p class="card-text"><strong>Aggiornato il: </strong> {{$post->updated_at}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
