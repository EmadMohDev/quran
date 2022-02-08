@extends('frontend.template')

@section ('content')
<section id="blog" class="container azkars">
    <div class="center remove-padding-margin">
        <h2>{{ $category->title }}</h2>
        <span> @lang('quran.azkar_count', ['count' => $category->azkars_count]) </span>
    </div>
    <div class="blog remove-padding-margin">
        <div class="blog-item azkars-body">
            @forelse ($azkars as $zekr)
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-footer">@lang('quran.count') {{ $zekr->count == 0 ? 1 : $zekr->count }}</div>
                        <div class="panel-body"> <p> {{ $zekr->zekr }} </p> </div>
                        <div class="panel-footer">{{ $zekr->reference }}</div>
                    </div>
                </div>
            @empty
            <div class="col-md-12 blog-content">@lang('quran.no-data')</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
