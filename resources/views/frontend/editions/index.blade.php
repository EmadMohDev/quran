@extends('frontend.template')

@section ('content')
<section id="blog" class="container surahs">
    <div class="center remove-padding-margin"> <h2>{{ $title }}</h2> </div>
    <div class="blog remove-padding-margin">
        <div class="search-temp">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <select id="languages" class="form-control input-group form-control-lg chosen" data-placeholder="Choose a Surah" name="lang" tabindex="1">
                            @foreach ($langs as $id => $name)
                            <option value="{{ $id }}" {{ session('applocale') == $name ? 'selected' : '' }}> {{ getLangName ($name) }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <input type="text" class="form-control" id="search" placeholder="@lang('quran.search')">
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-item" id="load-data"></div>
    </div>
</section>
@endsection
