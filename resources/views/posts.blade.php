@extends('layouts.public')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Lista post</h1>
        <ul>
          @forelse ($posts as $post)
            <li>{{$post->title}}</li>
          @empty
          <li>Non ci sono ancora post</li>
          @endforelse
        </ul>

        {{-- <div class="card" style="width: 30rem;">
          <div class="card-body">
            @forelse ($posts as $post)
              <h2 class="card-title">{{$post->title}}</h2>
              <h6 class="card-subtitle mb-2 text-muted">ID: {{$post->id}}</h6>
              <p class="card-text"><strong>Slug: </strong> {{$post->slug}}</p>
              <p class="card-text"><strong>Autore: </strong> {{$post->author}}</p>
              <p class="card-text"><strong>Creato il: </strong> {{$post->created_at}}</p>
              <p class="card-text"><strong>Aggiornato il: </strong> {{$post->updated_at}}</p>
            @empty
              <p class="card-text">Non ci sono ancora post</p>
            @endforelse
          </div>
        </div> --}}
      </div>
    </div>
  </div>

@endsection
