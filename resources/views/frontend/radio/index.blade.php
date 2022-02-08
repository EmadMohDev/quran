@extends('frontend.template')

@section ('content')
<link href="{{url('assets/custom/radio.css')}}" rel="stylesheet">
<section id="blog" class="container radio-body">
    <div class="center remove-padding-margin"> <h2>@lang('quran.radio')</h2> </div>
    <div class="blog">
        <div class="search-temp">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <select id="radios" class="form-control chosen" data-placeholder="Choose a Radio" name="radio" tabindex="1">
                            @foreach ($radios as $radio)
                            <option value="{{ $radio['radio_url'] }}"> {{ $radio['name'] }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.radio.player')
    </div>
</section>
@endsection

@section('script')
<script>
    $(function () {
        let radio = $('#radio');
        let check = false;
        changeTitle ($('#radios').find('option:selected').text());

        $('body').on('change', '#radios', function () {
            loadAudio ($(this).val());
            playRadio ();
        });

        $('body').on('click', '.skip-button', function () {
            let current = $('#radios').val();
            let next    = $('#radios option[value= "'+current+'"]').next().val();
            changeChannel (next);
        });

        $('body').on('click', '.back-button', function () {
            let current = $('#radios').val();
            let prev    = $('#radios option[value= "'+current+'"]').prev().val();
            changeChannel (prev);
        });

        $('body').on('click', '.play-button', function (e) {
            if (check == true) pauseRadio();
            else {
                if (radio.find('source').attr('src') == '')
                loadAudio ($('#radios').val());
                playRadio();
            };
        });

        $('body').on("ended", '#radio', function () {
            $('.skip-button').click();
        });

        function playRadio () {
            $('.play-button').find('i').removeClass('fa-play').addClass('fa-pause');
            $('.play-button').find('span.button-text').text('{{ __("quran.pause") }}');
            changeTitle ($('#radios').find('option:selected').text());
            radio.trigger("play");
            check = true;
        }

        function pauseRadio () {
            $('.play-button').find('i').removeClass('fa-pause').addClass('fa-play');
            $('.play-button').find('span.button-text').text('{{ __("quran.play") }}');
            radio.trigger("pause");
            check = false;
        }

        function changeChannel (url) {
            if (url != undefined && url != null) {
                $('#radios').val(url);
                $('#radios').chosen().trigger("chosen:updated");
                $('#radios').change();
            }
        }

        function loadAudio (url) {
            radio.find('source').attr('src', 'https://resolvehttp.herokuapp.com/?_url='+url);
            radio.load();
        }

        function changeTitle (title) {
            $('.radio_title marquee').empty().text(title);
        }
    });
</script>
@endsection
