@extends('layouts.public')
@section('content')
  <div class="container containerImg">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="listaPost">{{__('messages.post')}}</h1>
        <ul>
          @forelse ($posts as $post)
            <li class="listaPost"><a href="{{route('blog.show',['slug' => $post->slug])}}">{{$post->title}}</a></li>
          @empty
          <li class="listaPost">Non ci sono ancora post</li>
          @endforelse
        </ul>
         {{$posts->links()}} {{--se si vuol gestire la paginazione e dividere i post per pagina--}}
      </div>
    </div>
  </div>

@endsection
