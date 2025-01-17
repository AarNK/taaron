<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#updateBarangKeluarModal{{ $barangkeluar->id }}">
    <i class="fa fa-edit"></i> Edit
</button>

<div class="modal fade" id="updateBarangKeluarModal{{ $barangkeluar->id }}" tabindex="-1" role="dialog" aria-labelledby="updateBarangKeluarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateBarangKeluarModalLabel">Edit Barang Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('barangkeluar.update', $barangkeluar->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="barang_id">Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" {{ $barangkeluar->barang_id == $barang->id ? 'selected' : '' }}>{{ $barang->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stokkurang">Stok Keluar</label>
                        <input type="number" name="stokkurang" id="stokkurang" value="{{ $barangkeluar->stokkurang }}" class="form-control" required>
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
