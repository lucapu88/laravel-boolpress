<div class="card text-center gradient">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <p class="card-text">{{__('messages.footer_title')}}</p>
    <i class="fab fa-twitter-square fa-2x"></i>
    <i class="fab fa-facebook-square fa-2x"></i>
    <i class="fab fa-instagram fa-2x"></i>
    <i class="fab fa-youtube-square fa-2x"></i>
  </div>
  <div class="card-body">
    <p class="card-text">
      {{__('messages.footer_client')}} 0212345<br>
      <small>{{__('messages.footer_IVA')}}: 1234567890</small><br>
      <small>Copyright © 2020 Luca Caputo</small>
    </p>
  </div>
  <div class="admin">
    <small><a href="{{ route('admin.home') }}">admin</a></small> {{-- creato per comodità mia --}}
  </div>
  {{-- <div class="card-footer text-muted">
    2 days ago
  </div> --}}
</div>
