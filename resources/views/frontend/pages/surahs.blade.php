@extends('frontend.template')

@section ('content')
<section id="blog" class="container surahs">
    <div class="center remove-padding-margin">
            <h2>@lang('quran.surahs') </h2>
            <div class="col-md-12 search-temp">
                <div class="form-group">
                    <input type="text" class="form-control" id="search" placeholder="@lang('quran.search')">
                </div>
            </div>
    </div>
    <div class="blog remove-padding-margin">
        <div class="blog-item" id="load-data">
            <div class="row"></div>
        </div>
    </div>
</section>
@endsection
