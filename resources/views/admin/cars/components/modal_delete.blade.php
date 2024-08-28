<!-- Modal -->
<div class="modal fade" id="deleteBrand" tabindex="-1" aria-labelledby="deleteBrandLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteBrandLabel">Conferma cancellazione brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="text-modal"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <form id="form-delete" class="mx-1" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-square btn-danger">
                        Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
