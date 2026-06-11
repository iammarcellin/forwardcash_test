@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('partials.home.hero')
    @include('partials.home.about-process')
    @include('partials.home.signup-video')
    @include('partials.home.about-us')
@endsection
