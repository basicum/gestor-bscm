@extends('layouts.login')

@section('content')



<div class="content">
      <form class="form-signin" name="form_sample_1"   id="form_sample_1" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
          <img class="mb-4" src="img/logo4.png" alt="" width="172" height="72">

          <h3 class="form-title">Acceso al Gestor</h3>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} control-group">
              <label for="email" class="control-label visible-ie8 visible-ie9">Usuario</label>

              <div class="controls">
                  <div class="input-icon left">
                      <i class="icon-user"></i>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                  </div>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} control-group">
              <label for="password" class="control-label visible-ie8 visible-ie9">Password</label>
              <div class="controls">
                  <div class="input-icon left">
                      <i class="icon-lock"></i>
                      <input id="password" type="password" class="form-control m-wrap placeholder-no-fix" name="password">
                  </div>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-actions">

              <button type="submit" class="btn btn-lg btn-primary btn-block">
                  <i class="fa fa-btn fa-sign-in"></i> E N T R A R
              </button>
              <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
              {{--No resetemos password--}}
              {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
          </div>
    </form>


@endsection
