@extends('layouts.login')

@section('content')
<div class="content">
      <form name="form_sample_1"   id="form_sample_1" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
          <h3 class="form-title">Acceso al Gestor</h3>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} control-group">
              <label for="email" class="control-label visible-ie8 visible-ie9">Usuario</label>

              <div class="controls">
                  <div class="input-icon left">
                      <i class="icon-user"></i>
                      <input id="email" type="email" class="m-wrap placeholder-no-fix" name="email" value="{{ old('email') }}">
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

              <button type="submit" class="btn red">
                  <i class="fa fa-btn fa-sign-in"></i> E N T R A R
              </button>
              {{--No resetemos password--}}
              {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
          </div>
    </form>


@endsection
