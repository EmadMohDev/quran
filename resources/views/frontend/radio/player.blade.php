<div class="media-controls">
    <p class="radio_title">
        <marquee scrollamount="8">---</marquee>
    </p>
    {{-- <p class="radio_title">---</p> --}}
    <div class="media-buttons">
        <button class="back-button media-button" label="back">
            <i class="fa fa-step-backward button-icons"></i>
            <span class="button-text milli">@lang('quran.back')</span>
        </button>

        <button class="play-button media-button" label="play">
            <i class="fa fa-play button-icons delta"></i>
            <span class="button-text milli">@lang('quran.play')</span>
        </button>

        <button class="skip-button media-button" label="skip">
            <i class="fa fa-step-forward button-icons"></i>
            <span class="button-text milli">@lang('quran.next')</span>
        </button>
    </div>
    {{-- <div class="media-progress">
        <div class="progress-bar-wrapper progress">
            <div class="progress-bar">
            </div>
        </div>
        <div class="progress-time-current milli">
            00:00
        </div>
    </div> --}}
    <audio class="progress-bar-wrapper progress" controls id="radio"> <source src=""> </audio>
</div>
