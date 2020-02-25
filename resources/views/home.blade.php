{{-- HOMEPAGE PUBLICA --}}
@extends('layouts.public')
@section('content')
  <div class="col-sm-12 home">
    <div class="title">
      <h1>Le ricette della nonna</h1>
      <h2>Ricette per tutti</h2>
      <a class="btn btn-primary btn-lg" href="{{route('blog')}}"><i class="fas fa-utensils"></i> Scopri le nostre ricette</a>
    </div>
  </div>
@endsection
