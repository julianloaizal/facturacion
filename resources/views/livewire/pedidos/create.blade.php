<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_pedido"></label>
                <input wire:model="id_pedido" type="text" class="form-control" id="id_pedido" placeholder="Id Pedido">@error('id_pedido') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="medio_pago"></label>
                <input wire:model="medio_pago" type="text" class="form-control" id="medio_pago" placeholder="Medio Pago">@error('medio_pago') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_creacion"></label>
                <input wire:model="fecha_creacion" type="text" class="form-control" id="fecha_creacion" placeholder="Fecha Creacion">@error('fecha_creacion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cantidad_producto"></label>
                <input wire:model="cantidad_producto" type="text" class="form-control" id="cantidad_producto" placeholder="Cantidad Producto">@error('cantidad_producto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cantidad_servicio"></label>
                <input wire:model="cantidad_servicio" type="text" class="form-control" id="cantidad_servicio" placeholder="Cantidad Servicio">@error('cantidad_servicio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="vendedor_id_vendedor"></label>
                <input wire:model="vendedor_id_vendedor" type="text" class="form-control" id="vendedor_id_vendedor" placeholder="Vendedor Id Vendedor">@error('vendedor_id_vendedor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cliente_id_vendedor"></label>
                <input wire:model="cliente_id_vendedor" type="text" class="form-control" id="cliente_id_vendedor" placeholder="Cliente Id Vendedor">@error('cliente_id_vendedor') <span class="error text-danger">{{ $message }}</span> @enderror
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
