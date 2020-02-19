@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Gestione posts</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titolo</th>
              <th>Slug</th>
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
                <td>{{$post->author}}</td>
                <td>
                  <a class="btn btn-outline-primary" href="#">Visualizza Dettagli</a>
                  <a class="btn btn-outline-warning" href="#">Modifica</a>
                  {{-- <form class="delete" action="{{route()}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger" value="Elimina">
                  </form> --}}
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
