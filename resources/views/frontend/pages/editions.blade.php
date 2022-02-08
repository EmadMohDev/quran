@extends('frontend.template')

@section ('content')
<section id="blog editions" class="container editions">
    <div class="center remove-padding-margin"> <h2>@lang('quran.editions')</h2> </div>
    <div class="blog remove-padding-margin">
        <div class="search-temp">
            <div class="form-group">
                <input type="text" class="form-control" id="search" placeholder="@lang('quran.search')">
            </div>
        </div>
        <div class="blog-item" id="load-data">
            <div class="row"></div>
        </div>
    </div>
</section>
@endsection
