@extends('layouts.desktop')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <div class="card card-block">
                    <div class="card-title text-xs-center">{{ trans('auth.reset_password') }}</div>
                    <div class="card-text">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email" class="col-md-4 control-label">{{ trans('auth.email') }}</label>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('auth.send_password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
