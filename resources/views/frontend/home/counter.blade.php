<section id="partner">
    <div class="container remove-padding-margin">
        <div class="center wow fadeInDown remove-padding-margin">
            <h2>@lang('quran.statistics')</h2>
        </div>
        <div class="partners widgets row ">
            @foreach ($counter as $key => $count)
            <div class="col-md-3">
                <div class="widget">
                    <span class="badge badge-success">{{ number_format($count)  }}</span>
                    <span class="badge badge-light" style="">@lang('quran.'.$key)</span>
                </div>
            </div>
            @endforeach
            </ul>
        </div>
    </div>
</section>
