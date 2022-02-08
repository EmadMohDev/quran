@extends('template')
@section('page_title')
Create Ayah
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Create Ayah</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content" style="padding: 15px 30px">
                    <form action="{{ url('ayahs') }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @include('ayahs.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('#surahs .submenu').first().css('display', 'block');
        $('#ayahs .submenu').first().css('display', 'block');
        $('#ayahs-create').addClass('active');
    </script>
@stop
