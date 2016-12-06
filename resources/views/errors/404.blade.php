@extends('layouts.error')
@section('content')
    <div class="container">
        <div class="content">
            <div class="title">{{ trans('errors.404') }}</div>
            {{ html()->link(url()->previous(), trans('errors.click_to_back')) }}
        </div>
    </div>
@endsection

