{{-- HOMEPAGE PUBLICA --}}
@extends('layouts.public')
@section('content')
  <div class="col-sm-12 home">
    <div class="title">
      <h1>La cucina della nonna</h1>
      <h2>Ricette per tutti</h2>
      <a class="btn btn-primary btn-lg" href="{{route('blog')}}"><i class="fas fa-utensils"></i> {{__('messages.home_button')}}</a>
    </div>
  </div>
@endsection
