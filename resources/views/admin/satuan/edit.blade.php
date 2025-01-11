<!-- Tombol Edit -->
<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editSatuanModal{{ $satuan->id }}">
    <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="editSatuanModal{{ $satuan->id }}" tabindex="-1" role="dialog" aria-labelledby="editSatuanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSatuanModalLabel">Edit Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('satuan.update', $satuan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Satuan</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $satuan->name }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
