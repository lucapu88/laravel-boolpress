@extends('layouts.public')
@section('content')

  <div class="container text-center contenitoreGrazie">
    <div class="row">
      <div class="col-sm-8 mx-auto grazie">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">{{__('messages.thankYou')}}!</h2>
          </div>
          <div class="card-body">
            <h5 class="card-text">{{__('messages.answer')}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
