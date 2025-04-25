<!-- Button Delete -->
<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteJasaModal{{ $jasa->id }}">
    <i class="fa fa-trash"></i> Delete
</button>

<!-- Modal Delete -->
<div class="modal fade" id="deleteJasaModal{{ $jasa->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteJasaModalLabel{{ $jasa->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteJasaModalLabel{{ $jasa->id }}">Delete Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Jasa?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ route('jasa.destroy', $jasa->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
