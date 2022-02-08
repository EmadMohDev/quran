<section id="bottom">
    <div class="container wow fadeInDown remove-padding-margin" data-wow-duration="600ms" data-wow-delay="400ms" style="padding-bottom: 40px">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="widget">
                    <h3 style="text-transform: capitalize;">@lang('quran.providers-link')</h3>
                    <ul>
                        <li><a href="{{ url('show/providers'.getPramOpId()) }}">@lang('quran.show-providers')</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="widget">
                    <h3 style="text-transform: capitalize;">@lang('quran.quran-link')</h3>
                    <ul>
                        <li><a href="{{ url('quran'.getPramOpId()) }}">@lang('quran.quran')</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="widget">
                    <h3 style="text-transform: capitalize;">@lang('quran.tafsir-link')</h3>
                    <ul>
                        <li><a href="{{ url('tafsir'.getPramOpId()) }}">@lang('quran.tafsir')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
