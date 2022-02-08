<div class="col-md-12 bg-primary" style="margin: 20px 0">
    <h3 class="white">Audios</h3>
</div>

<div class="repeater-default">
    <div data-repeater-list="audios">
        @if (isset($ayah))
            @forelse ($ayah->audios as $index => $audio)
                @include('ayahs.audio')
            @empty
                @include('ayahs.audio')
            @endforelse
        @else
            @include('ayahs.audio')
        @endif
    </div>
    <div class="form-group overflow-hidden">
        <div class="col-md-11">
            <button type="button" data-repeater-create="" class="btn btn-info" style="margin-left: auto;display: block;"><i class="fa fa-plus"></i> Add</button>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('body').on('change', 'input[type="radio"]', function() {
            $('input[type="radio"]').not(this).prop('checked', false);
            $(this).prop('checked', true);
        });

        let audioSource = $('div[data-repeater-item]').last().find('audio').find('source').attr('src');
        if (audioSource == '')
            $('div[data-repeater-item]').last().find('audio').css('opacity', '0');

        $('[data-repeater-create]').on('click', function () {
            $('.chosen').chosen();
            $('div[data-repeater-item]').last().find('audio').css('opacity', '0');
            $('.remove-audio').last().data('id', '');
        });

        $('body').on('click', '.remove-audio', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            if (id) {
                $.ajax({
                    url: '{{ url("") }}/remove/audio/'+id,
                    type: "get",
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                    },
                });
            }
            $(this).parent().find('a[data-repeater-delete=""]').click();
            $(this).closest('div[data-repeater-item=""]').remove();
        });

        $(function () {
            $('body').on('change', 'input[type=file]', function () {
                let audio = $(this).closest('div[data-repeater-item]').find('audio');
                if ($(this).context.files && $(this).context.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        audio.empty().html('<source src="'+e.target.result+'">').load();
                        audio.css('opacity', '1');
                    }
                    reader.readAsDataURL($(this).context.files[0]);
                }
            });
        });
    });
</script>
