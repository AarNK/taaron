<!-- Tombol Edit -->
<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editBarangModal{{ $barang->id }}">
    <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="editBarangModal{{ $barang->id }}" tabindex="-1" role="dialog" aria-labelledby="editBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBarangModalLabel">Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $barang->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan_id">Satuan</label>
                        <select name="satuan_id" id="satuan_id" class="form-control" required>
                            <option value="">-- Pilih Satuan --</option>
                            @foreach ($satuans as $satuan)
                                <option value="{{ $satuan->id }}" {{ $barang->satuan_id == $satuan->id ? 'selected' : '' }}>{{ $satuan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                            @endforeach
                        </select>
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
