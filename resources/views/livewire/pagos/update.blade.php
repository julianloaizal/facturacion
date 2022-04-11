<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="id_pago"></label>
                <input wire:model="id_pago" type="text" class="form-control" id="id_pago" placeholder="Id Pago">@error('id_pago') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="descripcion"></label>
                <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="otros_detalles"></label>
                <input wire:model="otros_detalles" type="text" class="form-control" id="otros_detalles" placeholder="Otros Detalles">@error('otros_detalles') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="factura_id_factura"></label>
                <input wire:model="factura_id_factura" type="text" class="form-control" id="factura_id_factura" placeholder="Factura Id Factura">@error('factura_id_factura') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="factura_cliente_id_vendedor"></label>
                <input wire:model="factura_cliente_id_vendedor" type="text" class="form-control" id="factura_cliente_id_vendedor" placeholder="Factura Cliente Id Vendedor">@error('factura_cliente_id_vendedor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="factura_pedido_id_pedido"></label>
                <input wire:model="factura_pedido_id_pedido" type="text" class="form-control" id="factura_pedido_id_pedido" placeholder="Factura Pedido Id Pedido">@error('factura_pedido_id_pedido') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="factura_pedido_cliente_id_vendedor"></label>
                <input wire:model="factura_pedido_cliente_id_vendedor" type="text" class="form-control" id="factura_pedido_cliente_id_vendedor" placeholder="Factura Pedido Cliente Id Vendedor">@error('factura_pedido_cliente_id_vendedor') <span class="error text-danger">{{ $message }}</span> @enderror
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
