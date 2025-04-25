<!-- Button Tambah -->
<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createJasaModal">
    <i class="fa fa-plus"></i> Tambah Jasa
</button>

<!-- Modal Tambah -->
<div class="modal fade" id="createJasaModal" tabindex="-1" role="dialog" aria-labelledby="createJasaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createJasaModalLabel">Tambah Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jasa.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Jasa</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama jasa" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga jasa" step="0.01" required>
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
