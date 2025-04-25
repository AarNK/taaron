<!-- Button Edit -->
<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editJasaModal{{ $jasa->id }}">
    <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="editJasaModal{{ $jasa->id }}" tabindex="-1" role="dialog" aria-labelledby="editJasaModalLabel{{ $jasa->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJasaModalLabel{{ $jasa->id }}">Edit Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jasa.update', $jasa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Jasa</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $jasa->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" step="0.01" value="{{ $jasa->harga }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
