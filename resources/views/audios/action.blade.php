<td class="visible-md visible-lg">
    <div class="btn-group">
            <a class="btn btn-sm show-tooltip" href="{{ url('audios/'.$id.'/edit') }}" title="Edit"><i
                    class="fa fa-edit"></i></a>
            <a class="btn btn-sm show-tooltip btn-danger" onclick="$('#delete_{{ $id }}').submit()" title="Delete"><i class="fa fa-trash"></i></a>

            <form action="{{ url('audios/'.$id) }}"  method="post" id="delete_{{ $id }}">
                @csrf
                @method('delete')
            </form>
    </div>
</td>
