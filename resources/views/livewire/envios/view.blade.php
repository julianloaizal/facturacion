@section('title', __('Envios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Envio Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Envios">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Envios
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.envios.create')
						@include('livewire.envios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Envio</th>
								<th>Estado</th>
								<th>Nombre Emisor</th>
								<th>Direccion Emisor</th>
								<th>Nombre Receptor</th>
								<th>Direcccion Receptor</th>
								<th>Fecha Envio</th>
								<th>Fecha Estimada</th>
								<th>Completada</th>
								<th>Prioridad</th>
								<th>Pedido Id Pedido</th>
								<th>Pedido Cliente Id Vendedor</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($envios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_envio }}</td>
								<td>{{ $row->estado }}</td>
								<td>{{ $row->nombre_emisor }}</td>
								<td>{{ $row->direccion_emisor }}</td>
								<td>{{ $row->nombre_receptor }}</td>
								<td>{{ $row->direcccion_receptor }}</td>
								<td>{{ $row->fecha_envio }}</td>
								<td>{{ $row->fecha_estimada }}</td>
								<td>{{ $row->completada }}</td>
								<td>{{ $row->prioridad }}</td>
								<td>{{ $row->pedido_id_pedido }}</td>
								<td>{{ $row->pedido_cliente_id_vendedor }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Envio id {{$row->id}}? \nDeleted Envios cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $envios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
