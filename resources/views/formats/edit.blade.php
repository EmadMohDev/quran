@extends('template')
@section('page_title')
Edit Format
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Edit Format</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content" style="padding: 15px 30px">
                    <form action="{{ url('formats/'.$format->id) }}"  method="post">
                        @csrf
                        @method('put')
                        @include('formats.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('#quran .submenu').first().css('display', 'block');
        $('#editions .submenu').first().css('display', 'block');
        $('#formats .submenu').first().css('display', 'block');
        $('#formats-index').addClass('active');
    </script>
@stop
