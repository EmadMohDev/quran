<script src="{{url('assets/custom/reload.js')}}"></script>

@php $number = 1; @endphp
@forelse ($azkars as $azkar)
    <div class="col-xs-12 col-sm-6 blog-content" style="{{ app()->getLocale() == 'ar' ? 'float: right;' : '' }}">
        <a href="{{ url('category/'.$azkar->id.'/azkars'.getPramOpId()) }}" class="azkar_name" style="background: url({{ url('assets/frontend/images/categories/'.$number.'.svg') }}); background-size: cover">
            {{ $azkar->title }}
        </a>
    </div>
    @php
        $number++;
    if ($number == 4)
        $number = 1;
    @endphp
@empty
<div class="col-md-12 blog-content">@lang('quran.no-data')</div>
@endforelse
