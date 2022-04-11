<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="id_factura"></label>
                <input wire:model="id_factura" type="text" class="form-control" id="id_factura" placeholder="Id Factura">@error('id_factura') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_vencimiento"></label>
                <input wire:model="fecha_vencimiento" type="text" class="form-control" id="fecha_vencimiento" placeholder="Fecha Vencimiento">@error('fecha_vencimiento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="estado"></label>
                <input wire:model="estado" type="text" class="form-control" id="estado" placeholder="Estado">@error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cliente_id_vendedor"></label>
                <input wire:model="cliente_id_vendedor" type="text" class="form-control" id="cliente_id_vendedor" placeholder="Cliente Id Vendedor">@error('cliente_id_vendedor') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
