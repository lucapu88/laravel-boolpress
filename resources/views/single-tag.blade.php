@extends('layouts.public')
@section('content')
  <div class="container containerImg">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h1 class="listaPost">Lista tag: {{$tag->name}} </h1>
        <ul>
          @forelse ($posts as $post)
            <li class="listaPost"><a href="{{route('blog.show',['slug' => $post->slug])}}">{{$post->title}}</a></li>
          @empty
          <li class="listaPost">Non ci sono ancora post con questo tag</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>

@endsection
