<header class="navbar navbar-light navbar-fixed-top bg-faded">
    <div class="container-fluid">
        <nav>
            <div class="clearfix">
                <button class="navbar-toggler float-xs-right hidden-sm-up" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="true" aria-label="Toggle navigation"></button>
                <a class="navbar-brand hidden-sm-up" href="/">
                    {{ config('app.name') }}
                </a>
            </div>
            <a class="navbar-brand hidden-xs-down" href="/">{{ config('app.name') }}</a>
            <form class="form-inline float-xs-left" id="search-form">
                <input class="form-control" type="text" placeholder="Search">
            </form>
            <div class="navbar-toggleable-xs collapse" id="main-nav">
                <ul class="nav navbar-nav  float-xs-right">
                    @if (auth()->guest())

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">{{ trans('auth.login') }} <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">{{ trans('auth.register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="supportedContentDropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
                                <a class="dropdown-item" href="#">{{ trans('string.profile') }}</a>
                                <a class="dropdown-item" href="#">{{ trans('string.setting') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ trans('auth.logout') }}</a>
                                {!! form()->open(['url' => '/logout', 'method' => 'post', 'id' => 'logout-form']) !!}
                                {!! form()->close() !!}
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </nav>
    </div>
</header>
