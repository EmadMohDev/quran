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
                        @if (isset($category))
                        <form action="{{ url('categories/'.$category->id) }}"  method="post">
                            @method('put')
                        @else
                            <form action="{{ url('categories') }}"  method="post">
                        @endif
                        @csrf
                        @include('categories.inputs', ['buttonAction'=>''.\Lang::get("messages.save").''])
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('#categories .submenu').first().css('display', 'block');
        $('#categories-index').addClass('active');
    </script>
@stop
