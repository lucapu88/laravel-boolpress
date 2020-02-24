@extends('layouts.admin')
@section('content')
  <div class="container adminContainer">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="float-left">Gestione posts</h1>
        <a class="btn btn-outline-success float-right"  href="{{route('admin.posts.create')}}">Crea Nuovo</a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table adminContainer">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titolo</th>
              <th>Slug</th>
              {{-- <th>Categoria</th> --}}
              <th>Autore</th>
              <th>Azioni</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                {{-- <td>{{$post->category ? $post->category->name : ' '}}</td> --}}
                <td>{{$post->author}}</td>
                <td>
                  <a class="btn btn-outline-primary" href="{{route('admin.posts.show',['post'=>$post->id])}}">Visualizza Dettagli</a>
                  <a class="btn btn-outline-warning" href="{{route('admin.posts.edit',['post'=>$post->id])}}">Modifica</a>
                  <form class="delete" action="{{route('admin.posts.destroy',['post'=>$post->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger" value="Elimina">
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5">Non ci sono posts</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
