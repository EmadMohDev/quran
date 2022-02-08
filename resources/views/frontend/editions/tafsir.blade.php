<script src="{{url('assets/custom/reload.js')}}"></script>

@forelse ($ayahs as $index => $ayah)
    <div class="blog-content">
        <h2 class="playing">
            <p class="ayah-text" style="text-align: {{ $ayah->edition->direction == 'rtl' ? 'right' : 'left' }}">
                <span class="display-ayah">{{ $text[$index]['text'] ?? '' }}</span>
                <span class="text">{{ $ayah->text }}<span class="order_in_surah">{{ $ayah->order_in_surah }}</span> </span>
            </p>
            <button class="btn btn-sm play-audio" style="{{ $ayah->edition->direction == 'rtl' ? 'left: 0' : 'right:0' }};" data-href="{{ url(isset($text[$index]) ? $text[$index]->audioSrc() : '') }}">
                <img src="{{ url('assets/frontend/images/play.png') }}" style="width: 35px;">
            </button>
        </h2>
    </div>
@empty
<div class="blog-content" style="direction: rtl; padding-bottom: 10px 0">
    <h2 class="no-fount-data" class="playing">@lang('quran.no-data')</h2>
</div>
@endforelse
