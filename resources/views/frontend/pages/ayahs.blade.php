@extends('frontend.template')

@section ('content')
<section id="blog surahs" class="container surahs">
    <div class="blog surahs">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-item" id="load-ayah"></div>
            </div>
        </div>

        <div class="surahs-body">
            <audio controls autoplay id="play-audio"> <source src=""> </audio>
            <div>
                <label for="surahs">@lang('quran.surahs')</label>
                <select id="surahs" class="form-control chosen" data-placeholder="Choose a Surah" name="surah" tabindex="1">
                    @foreach ($surahs as $surah)
                    <option value="{{ $surah->id }}" {{ request()->surah == $surah->id ? 'selected' : '' }}> {{ transField($surah) }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')
<link rel="stylesheet" type="text/css" href="{{url('assets/chosen-bootstrap/chosen.min.css')}}" />
<script type="text/javascript" src="{{url('assets/chosen-bootstrap/chosen.jquery.min.js')}}"></script>
<script>
    let check = false;
    $(function () {

        $('body').on('change', '#surahs', function () {
            getData($(this).val());
        });

        getData($('#surahs').val());

        function getData(id)
        {
            $.ajax({
                url: window.location.href,
                type: "get",
                data: {surah: id},
                success: function (data, textStatus, jqXHR) {
                    $('#load-ayah').empty().append(data);
                },
            });
        }
    });
</script>
@endsection
