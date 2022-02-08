@extends('template')

@section('page_title')
Insert Ayahs
@stop

@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Insert Ayahs</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form action="{{ url('editions-ayahs') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8" style="margin-bottom: 20px">
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Select Edition <span class="text-danger">*</span></label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        {!! Form::select('edition', $editions->pluck('identifier', 'identifier'), null, ['class' => 'form-control chosen-rtl', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div> <button style="display: block; margin: auto" type="submit" id="submit" class="btn btn-primary">Inser All Ayahs of The Selected Edition</button> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Get APIs Data</h3>
                </div>
                <div class="box-content text-center">
                    <a class="btn btn-primary" style="margin-right: 20px" href="{{ url('insert-langs') }}">Langs</a>
                    <a class="btn btn-primary" style="margin-right: 20px" href="{{ url('insert-formats') }}">Formats</a>
                    <a class="btn btn-primary" style="margin-right: 20px" href="{{ url('insert-types') }}">Types</a>
                    <a class="btn btn-primary" style="margin-right: 20px" href="{{ url('insert-surahs') }}">Surahs</a>
                    <a class="btn btn-primary" style="margin-right: 20px" href="{{ url('insert-providers-editions') }}">Providers / Editions</a>
                    <a class="btn btn-primary" style="margin-right: 20px" href="{{ url('insert-ayahs') }}">Insert All Ayahs of All Editions</a>
                    <a class="btn btn-primary" style="margin-right: 20px" href="{{ url('insert-azkars') }}">Insert Azkars</a>
                </div>
            </div>
        </div>

    </div>

@stop

@section('script')
<script>
    $('#download-all').addClass('active');
    $(function () {
        $('form').on('submit', function () {
            $('#submit').attr("disabled", true);
        });

        $('a.btn').on('click', function () {
            $('a.btn').attr("disabled", true);
            $('button').attr("disabled", true);
        });
    });
</script>
@stop
