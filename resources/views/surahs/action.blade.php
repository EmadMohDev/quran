<td class="visible-md visible-lg">
    <div class="btn-group">
            <a class="btn btn-sm show-tooltip" href="{{ url('surahs/' . $id . '/edit') }}" title="Edit"><i class="fa fa-edit"></i></a>

            <a class="btn btn-sm btn-primary show-tooltip" href="{{ url('ayahs/create?surah=' . $id.(request()->has('edition') ? '&edition='.request()->edition : '')) }}" title="Add Ayah"><i class="fa fa-plus"></i></a>

            <a class="btn btn-sm btn-warning show-tooltip" href="{{ url('ayahs?'.(request()->edition ? 'edition='.request()->edition.'&' : '').'surah=' . $id) }}" title="List Ayahs"><i class="fa fa-list-ol"></i></a>

            <a class="btn btn-sm show-tooltip btn-danger" onclick="$('#delete_{{ $id }}').submit()" title="Delete"><i class="fa fa-trash"></i></a>

            <form action="{{ url('surahs/'.$id) }}"  method="post" id="delete_{{ $id }}">
                @csrf
                @method('delete')
            </form>
    </div>
</td>
