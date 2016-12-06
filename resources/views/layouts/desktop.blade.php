<!DOCTYPE html>
<html lang="{{ html_helper()->languageCode(config('app.locale')) }}">
    @include('layouts.includes.head')
<body>
@include('layouts.includes.header')
<div class="wrapper">
    <noscript>
        <div class="noscript">
            <p>Sorry, JavaScript must be enabled.<br/>Change your browser options, then <a href="">try again</a>.</p>
        </div>
    </noscript>
    @yield('content')
</div>
@include('layouts.includes.script')
</body>
</html>
