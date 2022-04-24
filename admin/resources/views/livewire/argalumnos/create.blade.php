<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Argalumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_gg"></label>
                <input wire:model="id_gg" type="text" class="form-control" id="id_gg" placeholder="Id Gg">@error('id_gg') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_esp"></label>
                <input wire:model="id_esp" type="text" class="form-control" id="id_esp" placeholder="Id Esp">@error('id_esp') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_alm"></label>
                <input wire:model="id_alm" type="text" class="form-control" id="id_alm" placeholder="Id Alm">@error('id_alm') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_turn"></label>
                <input wire:model="id_turn" type="text" class="form-control" id="id_turn" placeholder="Id Turn">@error('id_turn') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_sexo"></label>
                <input wire:model="id_sexo" type="text" class="form-control" id="id_sexo" placeholder="Id Sexo">@error('id_sexo') <span class="error text-danger">{{ $message }}</span> @enderror
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
