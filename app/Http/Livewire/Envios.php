<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Envio;

class Envios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_envio, $estado, $nombre_emisor, $direccion_emisor, $nombre_receptor, $direcccion_receptor, $fecha_envio, $fecha_estimada, $completada, $prioridad, $pedido_id_pedido, $pedido_cliente_id_vendedor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.envios.view', [
            'envios' => Envio::latest()
						->orWhere('id_envio', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->orWhere('nombre_emisor', 'LIKE', $keyWord)
						->orWhere('direccion_emisor', 'LIKE', $keyWord)
						->orWhere('nombre_receptor', 'LIKE', $keyWord)
						->orWhere('direcccion_receptor', 'LIKE', $keyWord)
						->orWhere('fecha_envio', 'LIKE', $keyWord)
						->orWhere('fecha_estimada', 'LIKE', $keyWord)
						->orWhere('completada', 'LIKE', $keyWord)
						->orWhere('prioridad', 'LIKE', $keyWord)
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
		$this->id_envio = null;
		$this->estado = null;
		$this->nombre_emisor = null;
		$this->direccion_emisor = null;
		$this->nombre_receptor = null;
		$this->direcccion_receptor = null;
		$this->fecha_envio = null;
		$this->fecha_estimada = null;
		$this->completada = null;
		$this->prioridad = null;
		$this->pedido_id_pedido = null;
		$this->pedido_cliente_id_vendedor = null;
    }

    public function store()
    {
        $this->validate([
		'id_envio' => 'required',
		'estado' => 'required',
		'nombre_emisor' => 'required',
		'direccion_emisor' => 'required',
		'nombre_receptor' => 'required',
		'direcccion_receptor' => 'required',
		'fecha_envio' => 'required',
		'fecha_estimada' => 'required',
		'completada' => 'required',
		'prioridad' => 'required',
		'pedido_id_pedido' => 'required',
		'pedido_cliente_id_vendedor' => 'required',
        ]);

        Envio::create([ 
			'id_envio' => $this-> id_envio,
			'estado' => $this-> estado,
			'nombre_emisor' => $this-> nombre_emisor,
			'direccion_emisor' => $this-> direccion_emisor,
			'nombre_receptor' => $this-> nombre_receptor,
			'direcccion_receptor' => $this-> direcccion_receptor,
			'fecha_envio' => $this-> fecha_envio,
			'fecha_estimada' => $this-> fecha_estimada,
			'completada' => $this-> completada,
			'prioridad' => $this-> prioridad,
			'pedido_id_pedido' => $this-> pedido_id_pedido,
			'pedido_cliente_id_vendedor' => $this-> pedido_cliente_id_vendedor
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Envio Successfully created.');
    }

    public function edit($id)
    {
        $record = Envio::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_envio = $record-> id_envio;
		$this->estado = $record-> estado;
		$this->nombre_emisor = $record-> nombre_emisor;
		$this->direccion_emisor = $record-> direccion_emisor;
		$this->nombre_receptor = $record-> nombre_receptor;
		$this->direcccion_receptor = $record-> direcccion_receptor;
		$this->fecha_envio = $record-> fecha_envio;
		$this->fecha_estimada = $record-> fecha_estimada;
		$this->completada = $record-> completada;
		$this->prioridad = $record-> prioridad;
		$this->pedido_id_pedido = $record-> pedido_id_pedido;
		$this->pedido_cliente_id_vendedor = $record-> pedido_cliente_id_vendedor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_envio' => 'required',
		'estado' => 'required',
		'nombre_emisor' => 'required',
		'direccion_emisor' => 'required',
		'nombre_receptor' => 'required',
		'direcccion_receptor' => 'required',
		'fecha_envio' => 'required',
		'fecha_estimada' => 'required',
		'completada' => 'required',
		'prioridad' => 'required',
		'pedido_id_pedido' => 'required',
		'pedido_cliente_id_vendedor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Envio::find($this->selected_id);
            $record->update([ 
			'id_envio' => $this-> id_envio,
			'estado' => $this-> estado,
			'nombre_emisor' => $this-> nombre_emisor,
			'direccion_emisor' => $this-> direccion_emisor,
			'nombre_receptor' => $this-> nombre_receptor,
			'direcccion_receptor' => $this-> direcccion_receptor,
			'fecha_envio' => $this-> fecha_envio,
			'fecha_estimada' => $this-> fecha_estimada,
			'completada' => $this-> completada,
			'prioridad' => $this-> prioridad,
			'pedido_id_pedido' => $this-> pedido_id_pedido,
			'pedido_cliente_id_vendedor' => $this-> pedido_cliente_id_vendedor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Envio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Envio::where('id', $id);
            $record->delete();
        }
    }
}
