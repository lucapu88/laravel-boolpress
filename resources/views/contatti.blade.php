@extends('layouts.public')
@section('content')
  <div class="container contatti">
    <div class="row">
      <div class="col-sm-12">
        <h1>{{__('messages.contact')}}</h1>
        <small>*= {{__('messages.Required_fields')}}</small>
        <form action="{{route('contatti.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">{{__('messages.name')}}*</label>
            <input type="text" class="form-control" name='name' id="name"  placeholder="Nome" required>
          </div>
          <div class="form-group">
            <label for="email">Email*</label>
            <input type="email" class="form-control" name='email' id="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="subject">{{__('messages.object')}}*</label>
            <input type="text" class="form-control" name='subject' id="subject" placeholder="Oggetto" required>
          </div>
          <div class="form-group">
            <label for="message">{{__('messages.message_text')}}*</label>
            <textarea class="form-control" id="message" placeholder="Inserisci qui il tuo messaggio..." name="message" rows="10" required></textarea>
          </div>
          <button type="submit" class="btn btn-success">{{__('messages.send')}}</button>
        </form>
      </div>
    </div>
  </div>

@endsection
