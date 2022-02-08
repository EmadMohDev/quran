<section id="feature" style="background: #d5c9c9 url(https://thefintechway.com/wp-content/uploads/2019/12/Islamic-Fintech.jpg);">
    <div class="container" >
        <div class="center wow fadeInDown py-0">
            <h2> <a href="{{ url('quran'.getPramOpId()) }}">@lang('quran.editions')</a> </h2><br>
        </div>

        <div class="row">
            <div class="features">
                @foreach ($editions as $index => $edition)
                    <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInDown" data-wow-duration="600ms" data-wow-delay="400ms">
                        <div class="feature-wrap provider {{ $loop->last ? 'my-0' : '' }}">
                            <i class="fa fa-bookmark" style="{{ $index%2==0 ? 'color:#ccc' : '' }}"></i>
                            <h2 class="provider-name">
                                <a href="{{ url('quran/'.$edition->identifier.'/surahs'.getPramOpId()) }}"> {{ \Str::words(transField($edition), 10) }} </a>
                                <br>
                                <small>{{ getLangName ($edition->lang->name) }}</small>
                            </h2>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
