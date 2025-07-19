<div x-data="{
    showDeleteModal: false,
    deleteUrl: null,
}" x-show="showDeleteModal" x-cloak
    @open-delete-modal.window="
        showDeleteModal = true;
        deleteUrl = $event.detail.deleteUrl;
    "
    class="modal modal-open">

    <div class="modal-box bg-white">
        <p class="py-2 font-semibold text-slate-900">
            Apakah anda yakin ingin menghapus data ini?
        </p>
        <hr class="mt-1 -mb-3 border-slate-400" />

        <div class="modal-action">
            <button @click="showDeleteModal = false" class="btn btn-sm btn-warning text-white">Batal</button>

            <form method="POST" :action="deleteUrl">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-error">Hapus</button>
            </form>
        </div>
    </div>
</div>
