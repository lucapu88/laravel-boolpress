@extends('layouts.public')
@section('content')
    <div class="containerInfo">
      <h1 class="text-center">{{__('messages.info-title')}}</h1>
      <h2 data-tilt data-tilt-max="20" data-tilt-speed="400" data-tilt-perspective="500"  src="https://via.placeholder.com/300x300" class="js-tilt text-center col-sm-8">{{__('messages.info-description')}}</h2>
    </div>
@endsection
