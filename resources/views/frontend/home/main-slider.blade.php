<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators hidden-xs">
            @foreach ($sliders as $index => $slider)
                <li data-target="#main-slider" data-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
            <div class="item {{ $loop->first ? 'active' : '' }}" style="background-image:url({{url('assets/frontend/images/slider/bg1.jpg')}})">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2 class="animation animated-item-2"> {{ transField($slider->provider) }} </h2>
                                <h3 style="color: #ccc" class="animation animated-item-2"> {{ getLangName ($slider->provider->editions()->first()->lang->name) }} </h3>
                                <a class="btn-slide animation animated-item-3" href="{{ providerRedirect($slider->provider).getPramOpId() }}">@lang('quran.read-more')</a>
                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="{{url('assets/frontend/images/slider/img1.png')}}" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="prev" href="#main-slider" data-slide="prev"> <i class="fa fa-chevron-left"></i> </a>
        <a class="next" href="#main-slider" data-slide="next"> <i class="fa fa-chevron-right"></i> </a>
    </div>
</section>
