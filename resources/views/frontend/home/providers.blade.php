<section id="feature">
    <div class="container" >
        <div class="center wow fadeInDown py-0">
            <h2> <a href="{{ url('quran'.getPramOpId()) }}">@lang('quran.providers')</a> </h2><br>
        </div>

        <div class="row">
            <div class="features">
                @foreach ($providers as $index => $provider)
                    <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInDown" data-wow-duration="600ms" data-wow-delay="400ms">
                        <div class="feature-wrap provider {{ $loop->last ? 'my-0' : '' }}">
                            <i class="fa fa-heart" style="{{ $index%2==0 ? 'color:#ccc' : '' }}"></i>
                            <h2 class="provider-name">
                                <a href="{{ providerRedirect($provider).getPramOpId() }}"> {{ \Str::words(transField($provider), 10) }} </a>
                                <br>
                                <small>{{ getLangName ($provider->editions->first()->lang->name) }}</small>
                            </h2>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
