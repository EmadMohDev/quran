@extends('frontend.template')

@section ('content')
<style>
    .border {
        border: 1px solid #3c763d;
    }
</style>
<section id="blog" class="container display-ayahs">
    <div class="blog">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-item" id="load-ayah" style=""></div>
            </div>
        </div>

        <div class="filter col-md-12">
            <div class="row">
                <div class="select-filter col-md-4">
                    <label for="edition">@lang('quran.editions')</label>
                    <select id="edition" class="form-control chosen" data-placeholder="Choose a Moshaf" name="edition" tabindex="1" style="">
                        @foreach ($editions as $edition)
                        <option value="{{ $edition->id }}"> {{ transField($edition) }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="select-filter col-xs-12 col-sm-3">
                    <label for="surahs">@lang('quran.surahs')</label>
                    <select id="surahs" class="form-control chosen" data-placeholder="Choose a Surah" name="surah" tabindex="1" style="">
                        <option value="{{ $surah->id }}" data-number={{ $surah->count_of_ayahs }}  selected> {{ transField($surah) }} </option>
                    </select>
                </div>

                <div class="select-filter col-xs-12 col-sm-3">
                    <label for="ayah">@lang('quran.ayahs')</label>
                    <select id="ayah" class="form-control chosen" data-placeholder="Choose a Moshaf" name="ayah" tabindex="1" style="">
                        @for ($i = $range['start']; $i <= $range['end']; $i++)
                        <option value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                    </select>
                </div>
                <div class="button-play-all" style="{{ app()->getLocale() == 'ar' ? 'direction: rtl; float: right;' : 'direction: ltr; float: left' }}">
                    <button class="btn btn-primary btn-sm" id="play-all" style="margin-top: 0">@lang('quran.play')</button>
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

        $('body').on('change', '#surahs', function () {
            loadNumbers ($('#surahs option:selected').data('number'));
        });

        function loadNumbers (number) {
            $('#ayah').empty().chosen('destroy');
            for (let index = 1; index <= number; index++) {
                let option = new Option(index , index);
                $('#ayah').append(option);
            }
            $('#ayah').chosen();
        }

        $('body').on('click', '#play-all', function () {
            $('.play-audio').first().click();
        });

        $('body').on('change', '#ayah', function () {
            let ele = $("#ayah_"+$(this).val());
            $(".border").removeClass('border');
            ele.addClass('border');
            ele.find('.play-audio').click();
        });

        $('body').on('change', '#edition', function () {
            init ();
        });

        init ();
        function init ()
        {
            surah  = $('#surahs').val();
            edition  = $('#edition').val();
            ayah   = '{{ request()->ayah }}';
            getData ();
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
                    $('html, body').animate({scrollTop: 0}, 1000);
                },
            });
        }
    });
</script>
@endsection
