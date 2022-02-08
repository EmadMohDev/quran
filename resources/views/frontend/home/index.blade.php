@extends('frontend.template')

@section ('content')

    @if ($sliders->count())
    @include('frontend.home.main-slider')
    @endif

    @if ($providers->count())
    @include('frontend.home.providers')
    @endif

    @if ($tafsers->count())
    @include('frontend.home.tafser')
    @endif

    @if ($editions->count())
    @include('frontend.home.editions')
    @endif

    @if ($mofasers->count())
    @include('frontend.home.mofasers')
    @endif

    @if ($categories->count())
    @include('frontend.home.azkars')
    @endif

    @if ($counter)
    @include('frontend.home.counter')
    @endif

@endsection
