<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Argmaestro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="id_gg"></label>
                <input wire:model="id_gg" type="text" class="form-control" id="id_gg" placeholder="Id Gg">@error('id_gg') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_esp"></label>
                <input wire:model="id_esp" type="text" class="form-control" id="id_esp" placeholder="Id Esp">@error('id_esp') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_mst"></label>
                <input wire:model="id_mst" type="text" class="form-control" id="id_mst" placeholder="Id Mst">@error('id_mst') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_turno"></label>
                <input wire:model="id_turno" type="text" class="form-control" id="id_turno" placeholder="Id Turno">@error('id_turno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_sexo"></label>
                <input wire:model="id_sexo" type="text" class="form-control" id="id_sexo" placeholder="Id Sexo">@error('id_sexo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
