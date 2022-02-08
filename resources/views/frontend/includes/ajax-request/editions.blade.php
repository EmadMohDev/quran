<script src="{{url('assets/custom/reload.js')}}"></script>
@forelse ($editions as $edition)
    <div class="col-xs-12 col-sm-4 col-md-3 blog-content" style="{{ app()->getLocale() == 'ar' ? 'float: right;' : '' }}">
        <h4><a href="{{ url('quran/'.$edition->identifier.'/surahs'.getPramOpId()) }}">{{ transField($edition) }}</a></h4>
    </div>
@empty
<div class="col-md-12 blog-content" style="{{ app()->getLocale() == 'ar' ? 'float: right;' : '' }}">لا يوجد بيانات</div>
@endforelse
{!! $editions->withQueryString()->links() !!}
