<style>
</style>

<section id="recent-works">
    {{-- <div class="container"> --}}
        <div class="center wow fadeInDown" style="padding-bottom: 10px;">
            <h2><a href="{{ url('tafsir'.getPramOpId()) }}">@lang('quran.tafsir')</a></h2>
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="min-height:400px;;background: #2a2a2a73;position: relative;overflow: hidden;background:url({{ url("assets/frontend/images/slider/bg1.jpg") }});background-origin: content-box;background-position: bottom;background-size: cover;">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="width:60%;margin:auto;color:#fff;font-weight:bold;font-size:24px;position:absolute;top: 0%;bottom:0%;transform: translate(-50%);left: 50%;box-shadow: 0 0 19px #000;display: flex;justify-content: center;align-items: center;width:80%;background: #00000073">
                @foreach ($tafsers as $index => $tafser)
                    <div class="item tafsir-item {{ $index == 0 ? 'wow fadeInDown animated active' : '' }} text-center" style="padding: 25px;line-height: 35px;position: relative; width:100%">
                        <p style="margin-bottom: 20px;font-size: 26px;">
                            {{ $tafser->ayah_text }}
                        </p>
                        <span style="color:#ccc;font-weight: 400; font-size: 19px;display: block;padding: 10px 0;border: 1px solid #00ff005e;box-shadow: 0 0px 7px #00ff005e;border-radius: 7px;">
                            {{ $tafser->text }}
                        </span>
                        <span style="font-size: 15px;margin-top: 15px; color: #818181;display: block; text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
                            {{ transField($tafser->surah) }}, @lang('quran.ayah-number') , {{ $tafser->order_in_surah }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    {{-- </div> --}}
</section>
