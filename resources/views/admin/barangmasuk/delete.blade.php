<form action="{{ route('barangmasuk.destroy', $barangmasuk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i> Hapus
    </button>
</form>
