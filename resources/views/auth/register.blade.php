@extends('layouts.desktop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <div class="card card-block">
                    <h3 class="card-title text-xs-center">Register</h3>
                    <div class="card-text">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email" class="control-label">{{ trans('auth.email') }}</label>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label for="password" class="control-label">{{ trans('auth.password') }}</label>
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="form-control-feedback">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="control-label">{{ trans('auth.confirm_password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ trans('auth.register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
