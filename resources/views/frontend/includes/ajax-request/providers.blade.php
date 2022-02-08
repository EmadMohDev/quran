<script src="{{url('assets/custom/reload.js')}}"></script>
@forelse ($providers as $provider)
    <div class="col-xs-12 col-md-4 blog-content">
        <h4><a href="{{ providerRedirect($provider).getPramOpId() }}">{{ transField($provider) }}</a></h4>
    </div>
@empty
<div class="col-md-12 blog-content">@lang('quran.no-data')</div>
@endforelse
{!! $providers->withQueryString()->links() !!}
