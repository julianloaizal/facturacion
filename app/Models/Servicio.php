<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'servicios';

    protected $fillable = ['id_servicio','nombre','descripcion','proveedor','precio','pedido_id_pedido','pedido_cliente_id_vendedor'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedido()
    {
        return $this->hasOne('App\Models\Pedido', 'id_pedido', 'pedido_id_pedido');
    }
    
   
}
