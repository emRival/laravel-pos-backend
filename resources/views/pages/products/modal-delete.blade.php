<div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="delete{{ $product->id }}">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">
                        Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus
                    {{ $product->name }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </form>
</div>
