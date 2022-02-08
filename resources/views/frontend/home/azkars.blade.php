<section id="feature azkar">
    <div class="container" >
        <div class="center wow fadeInDown py-0">
            <h2> <a href="{{ url('show/azkars'.getPramOpId()) }}">@lang('quran.azkars')</a> </h2>
        </div>

        <div class="row">
            <div class="features">
            @php $number = 1; @endphp
                @foreach ($categories as $index => $category)
                    <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInDown" data-wow-duration="600ms" data-wow-delay="400ms">
                        <div class="feature-wrap categories {{ $loop->last ? 'my-0' : '' }}" style="background: url({{ url('assets/frontend/images/categories/'.$number.'.svg') }})" style="padding: 0">
                            <a href="{{ url('category/'.$category->id.'/azkars'.getPramOpId()) }}" class="media-heading edition-name azkar_name" style="text-align: left;">
                                {{ $category->title }}
                            </a>
                        </div>
                    </div>
                    @php
                        $number++;
                    if ($number == 4)
                        $number = 1;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
</section>
