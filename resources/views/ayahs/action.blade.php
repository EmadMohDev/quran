<td class="visible-md visible-lg">
    <div class="btn-group">

        <a class="btn btn-sm btn-info show-tooltip" href="{{ url('post/create?ayah='.$ayah->id) }}" title="Create Post"><i class="fa fa-plus"></i></a>

        @if ($count = $ayah->posts()->count())
        <a class="btn btn-sm btn-primary show-tooltip" href="{{ url('post?ayah='.$ayah->id) }}" title="List Posts ({{ $count }})"><i class="fa fa-list-ol"></i></a>
        @endif

        <a class="btn btn-sm show-tooltip" href="{{ url('ayahs/'.$ayah->id.'/edit') }}" title="Edit"><i class="fa fa-edit"></i></a>

        <a class="btn btn-sm btn-warning show-tooltip" href="{{ url('audios?ayah='.$ayah->id) }}" title="List Audios"><i class="fa fa-list-ol"></i></a>

        <a class="btn btn-sm show-tooltip btn-danger" onclick="$('#delete_{{ $ayah->id }}').submit()" title="Delete"><i class="fa fa-trash"></i></a>

        <form action="{{ url('ayahs/'.$ayah->id) }}"  method="post" id="delete_{{ $ayah->id }}">
            @csrf
            @method('delete')
        </form>
    </div>
</td>
