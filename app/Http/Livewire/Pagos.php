<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pago;

class Pagos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_pago, $descripcion, $otros_detalles, $factura_id_factura, $factura_cliente_id_vendedor, $factura_pedido_id_pedido, $factura_pedido_cliente_id_vendedor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pagos.view', [
            'pagos' => Pago::latest()
						->orWhere('id_pago', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('otros_detalles', 'LIKE', $keyWord)
						->orWhere('factura_id_factura', 'LIKE', $keyWord)
						->orWhere('factura_cliente_id_vendedor', 'LIKE', $keyWord)
						->orWhere('factura_pedido_id_pedido', 'LIKE', $keyWord)
						->orWhere('factura_pedido_cliente_id_vendedor', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_pago = null;
		$this->descripcion = null;
		$this->otros_detalles = null;
		$this->factura_id_factura = null;
		$this->factura_cliente_id_vendedor = null;
		$this->factura_pedido_id_pedido = null;
		$this->factura_pedido_cliente_id_vendedor = null;
    }

    public function store()
    {
        $this->validate([
		'id_pago' => 'required',
		'descripcion' => 'required',
		'otros_detalles' => 'required',
		'factura_id_factura' => 'required',
		'factura_cliente_id_vendedor' => 'required',
		'factura_pedido_id_pedido' => 'required',
		'factura_pedido_cliente_id_vendedor' => 'required',
        ]);

        Pago::create([ 
			'id_pago' => $this-> id_pago,
			'descripcion' => $this-> descripcion,
			'otros_detalles' => $this-> otros_detalles,
			'factura_id_factura' => $this-> factura_id_factura,
			'factura_cliente_id_vendedor' => $this-> factura_cliente_id_vendedor,
			'factura_pedido_id_pedido' => $this-> factura_pedido_id_pedido,
			'factura_pedido_cliente_id_vendedor' => $this-> factura_pedido_cliente_id_vendedor
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Pago Successfully created.');
    }

    public function edit($id)
    {
        $record = Pago::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_pago = $record-> id_pago;
		$this->descripcion = $record-> descripcion;
		$this->otros_detalles = $record-> otros_detalles;
		$this->factura_id_factura = $record-> factura_id_factura;
		$this->factura_cliente_id_vendedor = $record-> factura_cliente_id_vendedor;
		$this->factura_pedido_id_pedido = $record-> factura_pedido_id_pedido;
		$this->factura_pedido_cliente_id_vendedor = $record-> factura_pedido_cliente_id_vendedor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_pago' => 'required',
		'descripcion' => 'required',
		'otros_detalles' => 'required',
		'factura_id_factura' => 'required',
		'factura_cliente_id_vendedor' => 'required',
		'factura_pedido_id_pedido' => 'required',
		'factura_pedido_cliente_id_vendedor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pago::find($this->selected_id);
            $record->update([ 
			'id_pago' => $this-> id_pago,
			'descripcion' => $this-> descripcion,
			'otros_detalles' => $this-> otros_detalles,
			'factura_id_factura' => $this-> factura_id_factura,
			'factura_cliente_id_vendedor' => $this-> factura_cliente_id_vendedor,
			'factura_pedido_id_pedido' => $this-> factura_pedido_id_pedido,
			'factura_pedido_cliente_id_vendedor' => $this-> factura_pedido_cliente_id_vendedor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Pago Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Pago::where('id', $id);
            $record->delete();
        }
    }
}
