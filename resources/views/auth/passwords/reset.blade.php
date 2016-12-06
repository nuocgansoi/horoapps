@extends('layouts.desktop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <div class="card card-block">
                    <h3 class="card-title text-xs-center">{{ trans('auth.reset_password') }}</h3>
                    <div class="card-text">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email" class="control-label">{{ trans('auth.email') }}</label>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ $email or old('email') }}" autofocus>
                                @if ($errors->has('email'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label for="password" class="control-label">{{ trans('auth.password') }}</label>
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                <label for="password-confirm" class="control-label">{{ trans('auth.confirm_password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ trans('auth.reset_password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
