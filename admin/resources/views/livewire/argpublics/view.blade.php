@section('title', __('Argpublics'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Argpublic Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Argpublics">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Argpublics
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.argpublics.create')
						@include('livewire.argpublics.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Mst</th>
								<th>Id Pbc</th>
								<th>Id Gradgrup</th>
								<th>Id Esp</th>
								<th>Id Turno</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($argpublics as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_mst }}</td>
								<td>{{ $row->id_pbc }}</td>
								<td>{{ $row->id_gradgrup }}</td>
								<td>{{ $row->id_esp }}</td>
								<td>{{ $row->id_turno }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Argpublic id {{$row->id}}? \nDeleted Argpublics cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $argpublics->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
