<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Factura;

class Facturas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_factura, $fecha_vencimiento, $estado, $cliente_id_vendedor, $pedido_id_pedido, $pedido_cliente_id_vendedor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.facturas.view', [
            'facturas' => Factura::latest()
						->orWhere('id_factura', 'LIKE', $keyWord)
						->orWhere('fecha_vencimiento', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->orWhere('cliente_id_vendedor', 'LIKE', $keyWord)
						->orWhere('pedido_id_pedido', 'LIKE', $keyWord)
						->orWhere('pedido_cliente_id_vendedor', 'LIKE', $keyWord)
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
		$this->id_factura = null;
		$this->fecha_vencimiento = null;
		$this->estado = null;
		$this->cliente_id_vendedor = null;
		$this->pedido_id_pedido = null;
		$this->pedido_cliente_id_vendedor = null;
    }

    public function store()
    {
        $this->validate([
		'id_factura' => 'required',
		'fecha_vencimiento' => 'required',
		'cliente_id_vendedor' => 'required',
		'pedido_id_pedido' => 'required',
		'pedido_cliente_id_vendedor' => 'required',
        ]);

        Factura::create([ 
			'id_factura' => $this-> id_factura,
			'fecha_vencimiento' => $this-> fecha_vencimiento,
			'estado' => $this-> estado,
			'cliente_id_vendedor' => $this-> cliente_id_vendedor,
			'pedido_id_pedido' => $this-> pedido_id_pedido,
			'pedido_cliente_id_vendedor' => $this-> pedido_cliente_id_vendedor
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Factura Successfully created.');
    }

    public function edit($id)
    {
        $record = Factura::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_factura = $record-> id_factura;
		$this->fecha_vencimiento = $record-> fecha_vencimiento;
		$this->estado = $record-> estado;
		$this->cliente_id_vendedor = $record-> cliente_id_vendedor;
		$this->pedido_id_pedido = $record-> pedido_id_pedido;
		$this->pedido_cliente_id_vendedor = $record-> pedido_cliente_id_vendedor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_factura' => 'required',
		'fecha_vencimiento' => 'required',
		'cliente_id_vendedor' => 'required',
		'pedido_id_pedido' => 'required',
		'pedido_cliente_id_vendedor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Factura::find($this->selected_id);
            $record->update([ 
			'id_factura' => $this-> id_factura,
			'fecha_vencimiento' => $this-> fecha_vencimiento,
			'estado' => $this-> estado,
			'cliente_id_vendedor' => $this-> cliente_id_vendedor,
			'pedido_id_pedido' => $this-> pedido_id_pedido,
			'pedido_cliente_id_vendedor' => $this-> pedido_cliente_id_vendedor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Factura Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Factura::where('id', $id);
            $record->delete();
        }
    }
}
