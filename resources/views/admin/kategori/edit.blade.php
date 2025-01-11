<!-- Tombol Edit -->
<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editKategoriModal{{ $kategori->id }}">
    <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="editKategoriModal{{ $kategori->id }}" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $kategori->name }}" required>
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
