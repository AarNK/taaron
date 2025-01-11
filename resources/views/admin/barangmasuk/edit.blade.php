<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#updateBarangMasukModal{{ $barangmasuk->id }}">
    <i class="fa fa-edit"></i> Edit
</button>

<div class="modal fade" id="updateBarangMasukModal{{ $barangmasuk->id }}" tabindex="-1" role="dialog" aria-labelledby="updateBarangMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateBarangMasukModalLabel">Edit Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('barangmasuk.update', $barangmasuk->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="barang_id">Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" {{ $barangmasuk->barang_id == $barang->id ? 'selected' : '' }}>{{ $barang->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stokawal">Stok Awal</label>
                        <input type="number" name="stokawal" id="stokawal" value="{{ $barangmasuk->stokawal }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stoktambah">Stok Masuk</label>
                        <input type="number" name="stoktambah" id="stoktambah" value="{{ $barangmasuk->stoktambah }}" class="form-control" required>
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
