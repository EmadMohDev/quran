@extends('frontend.template')

@section ('content')
<section id="blog" class="container display-ayahs">
    <div class="blog">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-item" id="load-ayah" style=""></div>
            </div>
        </div>

        <div class="filter col-md-12">
            <div class="row">
                <div class="select-filter col-xs-12 col-sm-3">
                    <label for="lang">@lang('quran.languages')</label>
                    <select id="lang" class="form-control chosen" data-placeholder="Choose a Langs" name="lang" tabindex="1" style="">
                        @foreach ($langs as $id => $name)
                            <option value="{{ $id }}" {{ $id == $current_edition->edition_lang_id ? 'selected' : '' }}> {{ getLangName ($name) }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="select-filter col-xs-12 col-sm-3">
                    <label for="edition">@lang('quran.editions')</label>
                    <select id="edition" class="form-control chosen" data-placeholder="Choose a Moshaf" name="edition" tabindex="1" style="">
                        @foreach ($editions as $edition)
                        <option value="{{ $edition->id }}" {{ $edition->identifier == $current_edition->identifier ? 'selected' : '' }}> {{ transField($edition) }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="select-filter col-xs-12 col-sm-3">
                    <label for="surahs">@lang('quran.surahs')</label>
                    <select id="surahs" class="form-control chosen" data-placeholder="Choose a Surah" name="surah" tabindex="1" style="">
                        @foreach ($surahs as $surah)
                        <option value="{{ $surah->id }}" data-number={{ $surah->count_of_ayahs }}  {{ request()->surah == $surah->id ? 'selected' : '' }}> {{ transField($surah) }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="select-filter col-xs-12 col-sm-3">
                    <label for="ayah">@lang('quran.ayahs')</label>
                    <select id="ayah" class="form-control chosen" data-placeholder="Choose a Mofasir" name="ayah" tabindex="1" style="">
                        <option> --- </option>
                    </select>
                </div>
                <div class="button-play-all" style="{{ app()->getLocale() == 'ar' ? 'direction: rtl; float: right;' : 'direction: ltr; float: left' }}">
                    <button class="btn btn-primary btn-sm" id="play-all">@lang('quran.play')</button>
                </div>
            </div>
            <button class="toggle_search btn btn-to-gray d-sm-block d-md-none"> <i class="fa fa-filter"></i> </button>
        </div>
    </div>
    <audio controls autoplay id="play-audio" style="opacity: 0;height: 0px;width:0"> <source src=""> </audio>
</section>
@endsection

@section('script')
<script>
    $(function () {
        let filter = $('.display-ayahs .filter');

        resizeWindow();

        $( window ).resize( function(){resizeWindow();});

        function resizeWindow() {
            if($(window).width() <= 1000 ){
                filter.css('top', '-'+(Math.abs(80 - filter.innerHeight()))+'px');
            } else {
                filter.css('top', 90+'px');
            }
        }

        $('.toggle_search').on('click', function () {
            let ele_height = filter.innerHeight();
            if (filter.css('top') > '0px')
                filter.css('top', '-'+(Math.abs(80 - ele_height))+'px');
            else
                filter.css('top', 90+'px');
        });

        let edition = $('#edition').val();
        let surah  = $('#surahs').val();
        loadNumbers ($('#surahs option:selected').data('number'));
        let ayah   = $('#ayah').val();
        let lang_id   = $('#lang').val();
        getEditions(lang_id);

        getData ();
        $('body').on('change', '#surahs', function () {
            loadNumbers ($('#surahs option:selected').data('number'));
        });

        $('body').on('change', '#surahs, #edition, #ayah, #lang', function () {
            init ();
        });

        $('body').on('change', '#lang', function () {
            let lang_id = $(this).val();
            getEditions(lang_id);
        });

        function loadNumbers (number) {
            $('#ayah').empty().chosen('destroy');
            for (let index = 1; index <= number; index++) {
                let option = new Option(index , index);
                $('#ayah').append(option);
            }
            $('#ayah').chosen();
        }

        function getData () {
                $('body').addClass('load');
            $.ajax({
                url: window.location.href,
                type: "get",
                data: {edition: edition, surah: surah, ayah: ayah},
                success: function (data, textStatus, jqXHR) {
                    audios = [];
                    $('#play-audio').trigger("pause");
                    $('#load-ayah').empty().append(data);
                    $('body').removeClass('load');
                    $('#ayah').val(ayah).trigger("chosen:updated");
                    $('#surahs').val(surah).trigger("chosen:updated");
                    $('html, body').animate({scrollTop: 0}, 1000);
                },
            });
        }

        function getEditions(lang_id) {
            $.ajax({
                url: window.location.href,
                type: "get",
                data: {lang_id: lang_id},
                success: function (data, textStatus, jqXHR) {
                    $('#edition').empty().chosen('destroy');
                    $.each(data, function (key, value) {
                        let option = new Option(value.name, value.id);
                        $('#edition').append(option);
                    });
                    $('#edition').chosen();
                    init ();
                },
            });
        }

        function init ()
        {
            surah  = $('#surahs').val();
            edition  = $('#edition').val();
            ayah   = $('#ayah').val();
            lang_id   = $('#lang').val();
            getData ();
        }

        $('body').on('click', '#play-all', function () {
            $('.play-audio').first().click();
        });
    });
</script>
@endsection
