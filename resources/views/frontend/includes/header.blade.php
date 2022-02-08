<header id="header">
    <nav class="navbar navbar-inverse" role="banner" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('home') }}"><img src="{{ url('assets/frontend/images/logo1.png') }}" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="{{checkInUrl('home') ? 'active' : '' }}"><a href="{{ url('home'.getPramOpId()) }}">@lang('quran.home')</a></li>
                    {{-- <li class="{{ checkInUrl('providers') ? 'active' : '' }}"><a href="{{ url('show/providers'.getPramOpId()) }}">@lang('quran.providers')</a></li> --}}
                    <li class="{{ checkInUrl('quran') ? 'active' : '' }}"><a href="{{ url('quran'.getPramOpId()) }}">@lang('quran.quran')</a></li>
                    <li class="{{ checkInUrl('tafsir') ? 'active' : '' }}"><a href="{{ url('tafsir'.getPramOpId()) }}">@lang('quran.tafsir')</a></li>
                    <li class="{{ checkInUrl('azkars') ? 'active' : '' }}"><a href="{{ url('show/azkars'.getPramOpId()) }}">@lang('quran.azkars')</a></li>
                    <li class="{{ checkInUrl('radio') ? 'active' : '' }}"><a href="{{ url('radio'.getPramOpId()) }}">@lang('quran.radio')</a></li>

                    <li>
                        <a href="{{ config()->get('languages')[app()->getLocale()] == "English" ? url('switch/lang/ar'.getPramOpId()) : url('switch/lang/en'.getPramOpId()) }}">
                            {{ config()->get('languages')[app()->getLocale()] == "English" ? "Arabic" : "English" }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('change/theme') }}" title="Theme Mode">
                            <i class="fa fa-adjust"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
