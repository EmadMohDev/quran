@extends('template')
@section('page_title')
 {{ request()->ayah ? $pageTitle : trans('messages.Post.Post') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.Post.Post')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>

                            <form action="{{ url('post/multi/delete') }}" method="post" style="display: none">
                                @csrf
                                @method('delete')
                                <input name="ids" type="hidden" id="multi_id">
                            </form>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="table-responsive">
                            {{ $dataTable->table([], true) }}
                        </div>

                        {{ $dataTable->scripts() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($value_from_session)
        <div class="modal show" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="margin-top: 280px;">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" style="font-weight: bold">
                            Copy Link
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa fa-close"></i></span>
                            </button>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group text-center">
                            <input disabled class="form-control" style="width: 90%;display: inline" value="{{ $value_from_session }}">
                            <span class="btn btn-info copy" title="Copy" style="margin-top: -5px;"> <i class="fa fa-copy"></i> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@stop

@section('script')
<script>
    $('#post').addClass('active');
    $('#post_index').addClass('active');
</script>
<script>
    $('.copy').click(function() {
        let input = $(this).parent().find('input');
        input.removeAttr('disabled');
        input.select();document.execCommand('copy');
        document.execCommand('copy');
        input.prop('disabled', true);
        $('.modal').removeClass('show');
    });

    $('.close').click(function() {
        $('.modal').removeClass('show');
    })
</script>
@stop
