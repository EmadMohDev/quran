<script src="{{url('assets/custom/reload.js')}}"></script>
@forelse ($surahs as $surah)
    <div class="col-xs-6 col-sm-4 col-md-3 blog-content" style="{{ app()->getLocale() == 'ar' ? 'float: right;' : '' }}">
        <h4 class="surah-name"><a style="font-size: 18px" href="{{ request()->url().'/'.$surah->id.getPramOpId() }}">{{ transField($surah) }}</a></h4>
    </div>
@empty
<div class="col-md-12 blog-content" style="{{ app()->getLocale() == 'ar' ? 'float: right;' : '' }}">لا يوجد بيانات</div>
@endforelse
