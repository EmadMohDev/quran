<script src="{{url('assets/custom/reload.js')}}"></script>
@foreach ($ayahs as $ayah)
    <div class="blog-content" style="direction: rtl;">
        <h2 style="position: relative" class="playing">
            <span class="ayah-text" style="display: block; width: 100%;line-height: 50px;padding-left:40px; cursor: pointer;">{{ $ayah->text }} ﴿{{ $ayah->order_in_surah }}﴾ </span>
            <button class="btn btn-sm btn-warning play-audio" style="position: absolute;top: 0;left: 0;" data-href="{{ url($ayah->audioSrc() ?? '') }}"><i class="fa fa-play-circle"></i></button>
        </h2>
        <hr style="border-top-color:#6c6c6c26;border-bottom: none">
    </div>
@endforeach
