<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedido;

class Pedidos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_pedido, $medio_pago, $fecha_creacion, $cantidad_producto, $cantidad_servicio, $vendedor_id_vendedor, $cliente_id_vendedor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pedidos.view', [
            'pedidos' => Pedido::latest()
						->orWhere('id_pedido', 'LIKE', $keyWord)
						->orWhere('medio_pago', 'LIKE', $keyWord)
						->orWhere('fecha_creacion', 'LIKE', $keyWord)
						->orWhere('cantidad_producto', 'LIKE', $keyWord)
						->orWhere('cantidad_servicio', 'LIKE', $keyWord)
						->orWhere('vendedor_id_vendedor', 'LIKE', $keyWord)
						->orWhere('cliente_id_vendedor', 'LIKE', $keyWord)
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
		$this->id_pedido = null;
		$this->medio_pago = null;
		$this->fecha_creacion = null;
		$this->cantidad_producto = null;
		$this->cantidad_servicio = null;
		$this->vendedor_id_vendedor = null;
		$this->cliente_id_vendedor = null;
    }

    public function store()
    {
        $this->validate([
		'id_pedido' => 'required',
		'medio_pago' => 'required',
		'fecha_creacion' => 'required',
		'cantidad_producto' => 'required',
		'cantidad_servicio' => 'required',
		'vendedor_id_vendedor' => 'required',
		'cliente_id_vendedor' => 'required',
        ]);

        Pedido::create([ 
			'id_pedido' => $this-> id_pedido,
			'medio_pago' => $this-> medio_pago,
			'fecha_creacion' => $this-> fecha_creacion,
			'cantidad_producto' => $this-> cantidad_producto,
			'cantidad_servicio' => $this-> cantidad_servicio,
			'vendedor_id_vendedor' => $this-> vendedor_id_vendedor,
			'cliente_id_vendedor' => $this-> cliente_id_vendedor
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Pedido Successfully created.');
    }

    public function edit($id)
    {
        $record = Pedido::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_pedido = $record-> id_pedido;
		$this->medio_pago = $record-> medio_pago;
		$this->fecha_creacion = $record-> fecha_creacion;
		$this->cantidad_producto = $record-> cantidad_producto;
		$this->cantidad_servicio = $record-> cantidad_servicio;
		$this->vendedor_id_vendedor = $record-> vendedor_id_vendedor;
		$this->cliente_id_vendedor = $record-> cliente_id_vendedor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_pedido' => 'required',
		'medio_pago' => 'required',
		'fecha_creacion' => 'required',
		'cantidad_producto' => 'required',
		'cantidad_servicio' => 'required',
		'vendedor_id_vendedor' => 'required',
		'cliente_id_vendedor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pedido::find($this->selected_id);
            $record->update([ 
			'id_pedido' => $this-> id_pedido,
			'medio_pago' => $this-> medio_pago,
			'fecha_creacion' => $this-> fecha_creacion,
			'cantidad_producto' => $this-> cantidad_producto,
			'cantidad_servicio' => $this-> cantidad_servicio,
			'vendedor_id_vendedor' => $this-> vendedor_id_vendedor,
			'cliente_id_vendedor' => $this-> cliente_id_vendedor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Pedido Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Pedido::where('id', $id);
            $record->delete();
        }
    }
}
