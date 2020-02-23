@extends('layouts.public')
@section('content')
  <div class="container containerImg">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="listaPost">Contattaci</h1>
        <form action="{{route('contatti.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name='name' id="name"  placeholder="Nome" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name='email' id="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="subject">Oggetto</label>
            <input type="text" class="form-control" name='subject' id="subject" placeholder="Oggetto" required>
          </div>
          <div class="form-group">
            <label for="message">Messaggio</label>
            <textarea class="form-control" id="message" placeholder="Inserisci qui il tuo messaggio..." name="message" rows="10" required></textarea>
          </div>
          <button type="submit" class="btn btn-success">Invia Messaggio</button>
        </form>
      </div>
    </div>
  </div>

@endsection
