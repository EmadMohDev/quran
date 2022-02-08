<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="text-align: left;">
                &copy; {{ date('Y') }} - IVAS - All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="{{ url('home'.getPramOpId()) }}">@lang('quran.home')</a></li>
                    {{-- <li><a href="{{ url('show/providers'.getPramOpId()) }}">@lang('quran.providers')</a></li> --}}
                    <li><a href="{{ url('quran'.getPramOpId()) }}">@lang('quran.quran')</a></li>
                    <li><a href="{{ url('tafsir'.getPramOpId()) }}">@lang('quran.tafsir')</a></li>
                    <li><a href="{{ url('show/azkars'.getPramOpId()) }}">@lang('quran.azkars')</a></li>
                    <li><a href="{{ url('radio'.getPramOpId()) }}">@lang('quran.radio')</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
