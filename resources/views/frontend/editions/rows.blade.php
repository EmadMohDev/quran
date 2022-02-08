<script src="{{url('assets/custom/reload.js')}}"></script>
@forelse ($editions as $edition)
    <div class="col-xs-12 col-md-4 blog-content" style="{{ app()->getLocale() == 'ar' ? 'float: right;' : '' }}">
        <h4>
            <a href="{{ url($url.'/'.$edition->identifier.'/surahs'.getPramOpId()) }}">
                {{ transField($edition) }} <br>
                ({{ getLangName ($edition->lang->name) }})
                {{-- ({{ getLangName () ?? 000 }}) --}}
            </a>
        </h4>
    </div>
@empty
<div class="col-md-12 blog-content" style="{{ app()->getLocale() == 'ar' ? 'float: right;' : '' }}">@lang('quran.no-data')</div>
@endforelse
{{-- {!! $editions->withQueryString()->links() !!} --}}
