<!-- Button Tambah -->
<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createSatuanModal">
    <i class="fa fa-plus"></i> Tambah Satuan
</button>

<!-- Modal Tambah -->
<div class="modal fade" id="createSatuanModal" tabindex="-1" role="dialog" aria-labelledby="createSatuanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSatuanModalLabel">Tambah Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('satuan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Satuan</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama satuan" required>
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
