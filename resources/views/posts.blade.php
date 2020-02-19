@extends('layouts.public')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Lista post</h1>
        <div class="card-body">
          @forelse ($posts as $post)

          @empty
            <p class="card-text">Non ci sono ancora post</p>
          @endforelse
          <h2 class="card-title">{{$phone->name}}</h2>
          <h6 class="card-subtitle mb-2 text-muted">Phone ID: {{$phone->id}}</h6>
          <p class="card-text"><strong>Prezzo €: </strong> {{$phone->price}}</p>
          <p class="card-text"><strong>Colore: </strong> {{$phone->color}}</p>
          <p class="card-text"><strong>Creato il: </strong> {{$phone->created_at}}</p>
          <p class="card-text"><strong>Aggiornato il: </strong> {{$phone->updated_at}}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
