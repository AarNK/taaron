<form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i> Hapus
    </button>
</form>
