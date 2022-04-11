<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Envio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_envio"></label>
                <input wire:model="id_envio" type="text" class="form-control" id="id_envio" placeholder="Id Envio">@error('id_envio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="estado"></label>
                <input wire:model="estado" type="text" class="form-control" id="estado" placeholder="Estado">@error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nombre_emisor"></label>
                <input wire:model="nombre_emisor" type="text" class="form-control" id="nombre_emisor" placeholder="Nombre Emisor">@error('nombre_emisor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="direccion_emisor"></label>
                <input wire:model="direccion_emisor" type="text" class="form-control" id="direccion_emisor" placeholder="Direccion Emisor">@error('direccion_emisor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nombre_receptor"></label>
                <input wire:model="nombre_receptor" type="text" class="form-control" id="nombre_receptor" placeholder="Nombre Receptor">@error('nombre_receptor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="direcccion_receptor"></label>
                <input wire:model="direcccion_receptor" type="text" class="form-control" id="direcccion_receptor" placeholder="Direcccion Receptor">@error('direcccion_receptor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_envio"></label>
                <input wire:model="fecha_envio" type="text" class="form-control" id="fecha_envio" placeholder="Fecha Envio">@error('fecha_envio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_estimada"></label>
                <input wire:model="fecha_estimada" type="text" class="form-control" id="fecha_estimada" placeholder="Fecha Estimada">@error('fecha_estimada') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="completada"></label>
                <input wire:model="completada" type="text" class="form-control" id="completada" placeholder="Completada">@error('completada') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="prioridad"></label>
                <input wire:model="prioridad" type="text" class="form-control" id="prioridad" placeholder="Prioridad">@error('prioridad') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pedido_id_pedido"></label>
                <input wire:model="pedido_id_pedido" type="text" class="form-control" id="pedido_id_pedido" placeholder="Pedido Id Pedido">@error('pedido_id_pedido') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pedido_cliente_id_vendedor"></label>
                <input wire:model="pedido_cliente_id_vendedor" type="text" class="form-control" id="pedido_cliente_id_vendedor" placeholder="Pedido Cliente Id Vendedor">@error('pedido_cliente_id_vendedor') <span class="error text-danger">{{ $message }}</span> @enderror
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
