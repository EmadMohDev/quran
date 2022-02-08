@extends('frontend.template')

@section ('content')
<section id="blog" class="container" style="padding-top: 15px;">
    <div class="blog">
        <div class="search-temp" style="position: fixed;z-index: 5;background: #fff;width: 64%;padding: 0 20px;top: 90px;left: 18%;">
            <form class="row" id="advanced-search" method="POST" action="{{ url('advanced/search') }}">
                @csrf
                <div class="form-group col-md-5">
                    <label for="providers">@lang('quran.providers')</label>
                    <select id="providers" class="form-control chosen" data-placeholder="Choose a Provider" name="provider" tabindex="1">
                        <option>---</option>
                        @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}"> {{ transField($provider) }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="editions">@lang('quran.editions')</label>
                    <select id="editions" class="form-control chosen" data-placeholder="Choose a Edition" name="edition" tabindex="1">
                        <option>---</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="surahs">@lang('quran.surahs')</label>
                    <select id="surahs" class="form-control chosen" data-placeholder="Choose a Surah" name="surah" tabindex="1">
                        <option>---</option>
                        @foreach ($surahs as $surah)
                        <option value="{{ $surah->id }}"> {{ transField($surah) }} </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-primary" style="margin-top: 20px;display: block;">@lang('quran.show')</button>
            </form>
        </div>
        <div class="row">
            <div class="blog-item row" id="load-ayats"></div>
        </div>
    </div>
</section>
@endsection

@section('script')
<link rel="stylesheet" type="text/css" href="{{url('assets/chosen-bootstrap/chosen.min.css')}}" />
<script type="text/javascript" src="{{url('assets/chosen-bootstrap/chosen.jquery.min.js')}}"></script>
<script>
    $(".chosen").chosen();
    $(function () {
        $('body').on('change', '#providers', function () {
            let editions = $('#editions');
            $.ajax({
                url: window.location.href,
                type: "get",
                data: {provider: $(this).val()},
                success: function (data, textStatus, jqXHR) {
                    editions.empty().chosen('destroy');
                    $.each(data, function (key, edition) {
                        let lang = '{{ app()->getLocale() }}' == 'ar' ? edition.name : edition.name_en;
                        let option =  new Option(lang , edition.id);
                        editions.append(option);
                    });
                    editions.chosen();
                },
            });
        });

        $('body').on('submit', '#advanced-search', function (e) {
            e.preventDefault()
            let provider = $('#providers').val();
            let edition  = $('#editions').val();
            let surah    = $('#surahs').val();

            if (provider > 0 && edition > 0 && surah > 0){
                $.ajax({
                    url: window.location.href,
                    type: "post",
                    data: {provider: provider, edition: edition, surah: surah, _token: $('input[name=_token]').val() },
                    success: function (data, textStatus, jqXHR) {
                        $('#load-ayats').empty().append(data);
                    },
                });
            }
        });
    });
</script>
@endsection
