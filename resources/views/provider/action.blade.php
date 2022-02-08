@if (get_action_icons('provider/{id}/edit', 'get'))
    <a class="btn btn-sm show-tooltip"
        href='{{ url("provider/$id/edit") }}'
        title="Edit"><i class="fa fa-edit"></i></a>
@endif
<a class="btn btn-sm btn-warning show-tooltip" href='{{ url("editions/create?provider=" . $id) }}' title="Add Edition"><i class="fa fa-plus"></i> </a>

<a class="btn btn-sm btn-warning show-tooltip" href='{{ url("editions?provider=" . $id) }}' title="List Editions"><i class="fa fa-list-ol"></i> </a>

@if (get_action_icons('provider/{id}/delete', 'get'))
    <form action="{{ url('provider/' . $id . '/delete') }}"
        method="GET" style="display: initial;">
        @csrf
        <input type="hidden" name="_method" value="DELETE" />
        <button type="submit" class="btn btn-sm btn-danger"
            style="height: 28px;"><i
                class="fa fa-trash"></i></button>
    </form>
@endif
