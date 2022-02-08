@extends('template')
@section('page_title', 'Multi Create Post')
@section('content')
    {{-- @include('errors') --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Multi Create Post</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    {!! Form::open(["url"=>"post/multi-create","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
                    @csrf
                    @include('post.multi-create-form')

                    <div class="text-center">
                        <button type="submit" class="btn btn-info" style="margin: 40px"><i class="fa fa-save"></i> Save</button>
                        <button type="reset" class="btn btn-warning" style="margin: 40px"><i class="fa fa-undo"></i> Reset</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script>
        $('#post').addClass('active');
        $('#post_multi_create').addClass('active');
    </script>

    <script>
        loadNumbers ($('select[name="surah_id"]').find('option:selected').data('number'));

        $('select[name="surah_id"]').change(function() {
            loadNumbers ($(this).find('option:selected').data('number'));
        });

        function loadNumbers (number) {
            $('#start-ayah, #end-ayah').empty().chosen('destroy');
            for (let index = 1; index <= number; index++) {
                let option = new Option(index , index);
                $('#start-ayah, #end-ayah').append(option);
            }
            $('#start-ayah, #end-ayah').chosen();
        }
    </script>
@stop
