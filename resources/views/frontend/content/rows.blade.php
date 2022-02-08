@forelse ($posts as $index => $post)
    <div class="blog-content" id="ayah_{{ $post->ayah->order_in_surah }}">
        <h2 class="playing">
            <p class="ayah-text">
                <span class="display-ayah">{{ $post->ayah->text }}</span>
                <span class="text">{{ $post->tafsir }}</span>
            </p>
            <button class="btn btn-sm play-audio" data-href="{{ url(isset($post->ayah) ? $post->ayah->audioSrc() : '') }}">
                <img src="{{ url('assets/frontend/images/play.png') }}" style="width: 35px;">
            </button>
        </h2>
    </div>
@empty
<div class="blog-content" style="direction: rtl; padding-bottom: 10px 0">
    <h2 class="no-fount-data" class="playing">@lang('quran.no-data')</h2>
</div>
@endforelse
