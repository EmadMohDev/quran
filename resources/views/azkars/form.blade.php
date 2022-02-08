@extends('template')
@section('page_title')
{{ isset($azkar) ? 'Edit' : 'Create New' }} Zekr
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i> {{ isset($azkar) ? 'Edit' : 'Create New' }} Zekr</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content" style="padding: 15px 30px">
                        @if (isset($zekr))
                        <form action="{{ url('azkars/'.$zekr->id) }}"  method="post">
                            @method('put')
                        @else
                            <form action="{{ url('azkars') }}"  method="post">
                        @endif

                        @csrf
                        @include('azkars.inputs')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('#azkars .submenu').first().css('display', 'block');
        $('#azkars-index').addClass('active');
    </script>
@stop
