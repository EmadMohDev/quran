@extends('template')
@section('page_title')
Editions
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-black">
                        <div class="box-title">
                            <h3><i class="fa fa-table"></i> Editions Table </h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="btn-toolbar pull-right">
                                <div class="btn-group">
                                    <form action="{{ url('editions/multi/delete') }}" method="post" style="display: none">
                                        @csrf
                                        @method('delete')
                                        <input name="ids" type="hidden" id="multi_id">
                                    </form>
                                </div>
                            </div>
                            <br><br>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    {{ $dataTable->table([], true) }}
                                </div>

                                {{ $dataTable->scripts() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('script')
    <script>
        $('#quran .submenu').first().css('display', 'block');
        $('#editions .submenu').first().css('display', 'block');
        $('#editions').addClass('active');
        $('#editions-index').addClass('active');
    </script>
@stop
