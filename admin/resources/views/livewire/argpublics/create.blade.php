<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Argpublic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_mst"></label>
                <input wire:model="id_mst" type="text" class="form-control" id="id_mst" placeholder="Id Mst">@error('id_mst') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_pbc"></label>
                <input wire:model="id_pbc" type="text" class="form-control" id="id_pbc" placeholder="Id Pbc">@error('id_pbc') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_gradgrup"></label>
                <input wire:model="id_gradgrup" type="text" class="form-control" id="id_gradgrup" placeholder="Id Gradgrup">@error('id_gradgrup') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_esp"></label>
                <input wire:model="id_esp" type="text" class="form-control" id="id_esp" placeholder="Id Esp">@error('id_esp') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_turno"></label>
                <input wire:model="id_turno" type="text" class="form-control" id="id_turno" placeholder="Id Turno">@error('id_turno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
