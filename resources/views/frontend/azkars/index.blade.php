@extends('frontend.template')

@section ('content')
<section id="blog" class="container surahs">
    <div class="center remove-padding-margin"> <h2>@lang('quran.azkars')</h2> </div>
    <div class="blog remove-padding-margin">
        <div class="search-temp">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" class="form-control" id="search" placeholder="@lang('quran.search')">
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-item" id="load-data"></div>
    </div>
</section>
@endsection
