$(function () {
    $(".chosen").chosen();
    //  START PLAY AUDIO
        $('body').on('click', 'p.ayah-text', function (e) {
            $(this).next('.play-audio').click();
        });

        $('body').on('click', '.play-audio', function (e) {
            let audio = $('#play-audio');                   // The Audio HTML Tag
            let audio_src = audio.find('source');             // The Source HTML Tag [ Child Of Audio Tag ]
            let btn = $(this);                            // The Button Play
            pauseAll();                                      // To Pause All Audio And Make All Is Default Color And Icon
            oldAyah ($(this).closest('.blog-content'));
            if (btn.data('href') != audio_src.attr('src')) {   // When Click On Play First Time [ This Src On Button Not Equal Src Of Audio ]  [ Then The User Clicked On New Button ]
                audio_src.attr('src', btn.data('href'));       // Load The Button Src On Audio Src
                audio.load();                                  // To Refresh The Audio Tag To Run The New SRC
                play(audio, btn);                        // Change The Color And Icon To This Button And Play The Audio
                btn.prev('.ayah-text').addClass('wow rollIn')
            } else {                                           // Here When The Button Src Equal The Audio Src [ The User Clicked On The Same Button ]
                if (check == true)
                    pause(audio, btn);                   // To Pause The Audio And Make His Color And Icon Is Default
                else
                    play(audio, btn);                     // To Play The Audio And Change His Color And Icon
            }
            scrolling();
        });

        // To Play (This) Audio
        function play(audio, btn) {
            playStyle(btn);
            audio.trigger("play");
        }

        //  To change the color button and icon
        function playStyle (btn) {
            check = true;
            $('.blog-content').removeClass('text-success');
            btn.prev().removeClass("text-muted").removeClass("text-dark").addClass('text-success');
            btn.find('img').attr('src', btn.find('img').attr('src').replace('play', 'pause'));
        }

        // To Pause (this) Audio
        function pause(audio, btn) {
            pauseStyle (btn);
            audio.trigger("pause");
        }

        //  To change the color button and icon
        function pauseStyle (btn) {
            check = false;
            btn.removeClass('btn-primary');
            btn.prev().removeClass("text-dark").removeClass("text-success").addClass("text-muted");
            btn.find('img').attr('src', btn.find('img').attr('src').replace('pause', 'play'));
        }

        // To Pause All Audios
        function pauseAll() {
            $('.play-audio-active').removeClass('play-audio-active');
            $('.play-audio').removeClass('btn-primary').find('i').addClass('fa-play text-dark').removeClass('fa-pause text-success');
            $('.play-audio').prev().removeClass('text-success');
            $('.play-audio').each(function () {
                $(this).find('img').attr('src', $(this).find('img').attr('src').replace('pause', 'play'))
            });
        }

        //  Change all prev and next color
        function oldAyah (current) {
            current.prevAll().each(function () {
                $(this).find('.ayah-text').removeClass("text-dark").removeClass("text-success").addClass("text-muted");
                $(this).find('.ayah-text button').removeClass('btn-primary');
            });

            current.nextAll().each(function () {
                $(this).find('.ayah-text').removeClass("text-muted").removeClass("text-success").addClass("text-dark");
                $(this).find('.ayah-text button').removeClass('btn-primary');
            });

            $('.play-audio-active').removeClass('play-audio-active');
            current.addClass('text-success play-audio-active');
            current.find('.ayah-text').removeClass("text-muted").removeClass("text-dark");
        }
        // end change colors

        // To Autoplay Audios
        $('#play-audio').on("ended", function () {
            let end_source = $(this).find('source').attr('src');
            let ended = $(".play-audio[data-href='"+end_source+"']");

            let old_parent = ended.closest('.blog-content');
            let old_play_button = ended.closest('.blog-content').find('.play-audio');
            pauseStyle (old_play_button);

            let current_parent = old_parent.next();
            let current_play_button = old_parent.next().find('.play-audio');
            if (current_play_button.length)
                playStyle (current_play_button);

            oldAyah (current_parent);

            $(this).find('source').attr('src', current_play_button.data('href'));
            $(this).load();
            $(this).trigger("play");

            scrolling ();
        });

        function scrolling () {
            var active = $('.play-audio-active');
            var activeOffset = active.offset().top;
            var activeHeight = active.height();
            var windowHeight = $(window).height();
            var offset;

            if (activeHeight < windowHeight) {
                offset = activeOffset - ((windowHeight / 2) - (activeHeight / 2));
            } else {
                offset = activeOffset;
            }

            $('html, body').animate({scrollTop: offset}, 2500);
        }
        // End Autoplay Audios
    //  END PLAY AUDIO

    if ($('#load-data').length) { loadData($('#search').val(), $('#languages').val()); }

    $('body').on('keyup', '#search', function (event) {
        // if ((event.keyCode <= 90 && event.keyCode >= 65) || (event.keyCode == 8))
            loadData($(this).val(), $('#languages').val());
    });

    $('body').on('change', '#languages', function (event) {
        loadData($('#search').val(), $(this).val());
    });

    function loadData(key, lang = null) {
        $('body').addClass('load');
        $.ajax({
            url: window.location.href,
            type: "get",
            data: {lang: lang, search: key},
            success: function (data, textStatus, jqXHR) {
                $('#load-data').empty().append(data);
                $('body').removeClass('load');
            },
        });
    }

});
