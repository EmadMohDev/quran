@extends('template')
@section('page_title')
Categories

<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 50px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
</style>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-black">
                        <div class="box-title">
                            <h3><i class="fa fa-table"></i> Categories Table </h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="btn-toolbar pull-right">
                                <div class="btn-group">
                                    <form action="{{ url('categories/multi/delete') }}" method="post" style="display: none">
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
        $('#categories .submenu').first().css('display', 'block');
        $('#categories-index').addClass('active');

        $('body').on('change', 'input.check-toggle', function (e) {
            let check = $(this);
            let field = check.attr('name');
            let id = check.attr('id').replace(field +'_','');
            let td = check.closest('td');
            let tr = check.closest('tr');
            $.ajax({
                url: '{{ url("categories/toggle/field/") }}/'+field,
                type: "get",
                data: { id: id },
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                },
            });
        });
    </script>
@stop
