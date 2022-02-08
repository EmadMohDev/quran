
<section id="feature">
    <div class="container" >
        <div class="center wow fadeInDown py-0">
            <h2> <a href="{{ url('tafsir'.getPramOpId()) }}">@lang('quran.mofasrien')</a> </h2>
        </div>

        <div class="row">
            <div class="features">
                @foreach ($mofasers as $index => $mofaser)
                    <div class="col-xs-12 col-sm-6 wow fadeInDown" data-wow-duration="600ms" data-wow-delay="400ms">
                        <div class="feature-wrap provider {{ $loop->last ? 'my-0' : '' }}">
                            <i class="fa fa-book" style="{{ $index%2==0 ? 'color:#ccc' : '' }}"></i>
                            <h2 class="media-heading edition-name">
                                <a href="{{ url('tafsir/'.$mofaser->identifier.'/surahs'.getPramOpId()) }}">
                                    {{ transField($mofaser) }}
                                    <br>
                                    <small>{{ getLangName ($mofaser->lang->name) }}</small>
                                </a>
                            </h2>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
