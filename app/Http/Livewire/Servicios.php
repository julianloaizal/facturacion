<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Servicio;

class Servicios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_servicio, $nombre, $descripcion, $proveedor, $precio, $pedido_id_pedido, $pedido_cliente_id_vendedor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.servicios.view', [
            'servicios' => Servicio::latest()
						->orWhere('id_servicio', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('proveedor', 'LIKE', $keyWord)
						->orWhere('precio', 'LIKE', $keyWord)
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
		$this->id_servicio = null;
		$this->nombre = null;
		$this->descripcion = null;
		$this->proveedor = null;
		$this->precio = null;
		$this->pedido_id_pedido = null;
		$this->pedido_cliente_id_vendedor = null;
    }

    public function store()
    {
        $this->validate([
		'id_servicio' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'proveedor' => 'required',
		'precio' => 'required',
		'pedido_id_pedido' => 'required',
		'pedido_cliente_id_vendedor' => 'required',
        ]);

        Servicio::create([ 
			'id_servicio' => $this-> id_servicio,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'proveedor' => $this-> proveedor,
			'precio' => $this-> precio,
			'pedido_id_pedido' => $this-> pedido_id_pedido,
			'pedido_cliente_id_vendedor' => $this-> pedido_cliente_id_vendedor
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Servicio Successfully created.');
    }

    public function edit($id)
    {
        $record = Servicio::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_servicio = $record-> id_servicio;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->proveedor = $record-> proveedor;
		$this->precio = $record-> precio;
		$this->pedido_id_pedido = $record-> pedido_id_pedido;
		$this->pedido_cliente_id_vendedor = $record-> pedido_cliente_id_vendedor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_servicio' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'proveedor' => 'required',
		'precio' => 'required',
		'pedido_id_pedido' => 'required',
		'pedido_cliente_id_vendedor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Servicio::find($this->selected_id);
            $record->update([ 
			'id_servicio' => $this-> id_servicio,
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'proveedor' => $this-> proveedor,
			'precio' => $this-> precio,
			'pedido_id_pedido' => $this-> pedido_id_pedido,
			'pedido_cliente_id_vendedor' => $this-> pedido_cliente_id_vendedor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Servicio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Servicio::where('id', $id);
            $record->delete();
        }
    }
}
