<button class="btn btn-sm m-1 btn-primary" data-toggle="modal" data-target="#createBarangKeluarModal">
    <i class="fa fa-plus"></i> Tambah
</button>

<!-- Create Modal -->
<div class="modal fade" id="createBarangKeluarModal" tabindex="-1" role="dialog" aria-labelledby="createBarangKeluarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBarangKeluarModalLabel">Stok Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('barangkeluar.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="barang_id">Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stokkurang">Kurang</label>
                        <input type="number" name="stokkurang" id="stokkurang" class="form-control" placeholder="Masukkan jumlah stok keluar" required>
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
