<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'envios';

    protected $fillable = ['id_envio','estado','nombre_emisor','direccion_emisor','nombre_receptor','direcccion_receptor','fecha_envio','fecha_estimada','completada','prioridad','pedido_id_pedido','pedido_cliente_id_vendedor'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedido()
    {
        return $this->hasOne('App\Models\Pedido', 'id_pedido', 'pedido_id_pedido');
    }
    

    
}
