@extends('template')
@section('page_title')
Audios
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-black">
                        <div class="box-title">
                            <h3><i class="fa fa-table"></i> Audios Table </h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="btn-toolbar pull-right">
                                <audio controls autoplay id="play-audio" style="display: none"> <source src=""> </audio>
                                <div class="btn-group">
                                    <form action="{{ url('audios/multi/delete') }}" method="post" style="display: none">
                                        @csrf
                                        @method('delete')
                                        <input name="ids" type="hidden" id="multi_id">
                                    </form>
                                </div>
                            </div>
                            <br><br>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    {{ $dataTable->table([], true) }}
                                </div>

                                {{ $dataTable->scripts() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('script')
    <script>
        $('#surahs .submenu').first().css('display', 'block');
        $('#audios .submenu').first().css('display', 'block');
        $('#audios-index').addClass('active');
    </script>
        <script>
        let check = false;
        $(function () {
            $('body').on('click', '.play-audio', function (e) {
                let audio   = $('#play-audio');                   // The Audio HTML Tag
                let audio_src = audio.find('source');             // The Source HTML Tag [ Child Of Audio Tag ]
                let btn     = $(this);                            // The Button Play
                let icon    = $(this).find('i');                  // The Icon On Button Play
                pauseAll ();                                      // To Pause All Audio And Make All Is Default Color And Icon

                if (btn.data('href') != audio_src.attr('src')) {   // When Click On Play First Time [ This Src On Button Not Equal Src Of Audio ]  [ Then The User Clicked On New Button ]
                    audio_src.attr('src', btn.data('href'));       // Load The Button Src On Audio Src
                    audio.load();                                  // To Refresh The Audio Tag To Run The New SRC
                    play(audio, btn, icon);                        // Change The Color And Icon To This Button And Play The Audio

                } else {                                           // Here When The Button Src Equal The Audio Src [ The User Clicked On The Same Button ]
                    if (check == true)
                        pause(audio, btn, icon);                   // To Pause The Audio And Make His Color And Icon Is Default
                    else
                        play(audio, btn, icon);                     // To Play The Audio And Change His Color And Icon
                }
            });

            // To Play (This) Audio
            function play (audio, btn, icon) {
                audio.trigger("play");
                check = true;
                btn.addClass('btn-warning');
                icon.removeClass('fa-play-circle').addClass('fa-pause');
            }

            // To Pause (this) Audio
            function pause (audio, btn, icon) {
                audio.trigger("pause");
                check = false;
                btn.removeClass('btn-warning');
                icon.addClass('fa-play-circle').removeClass('fa-pause');
            }

            // To Pause All Audios
            function pauseAll () {
                $('.play-audio').removeClass('btn-warning').find('i').addClass('fa-play-circle').removeClass('fa-pause');
            }

            $('#play-audio').on("ended", function () {
                let end_source = $(this).find('source').attr('src');
                let ended = $(".play-audio[data-href='"+end_source+"']");

                let old_parent = ended.closest('tr');
                let old_play_button = old_parent.find('.play-audio');
                let next_play_button = old_parent.next().find('.play-audio');

                pause ($(this), old_play_button, old_play_button.find('i'));
                play ($(this), next_play_button, next_play_button.find('i'));

                $(this).find('source').attr('src', next_play_button.data('href'));
                $(this).load();
                $(this).trigger("play");
            });
        });
    </script>
@stop
