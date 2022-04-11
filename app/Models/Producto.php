<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'productos';

    protected $fillable = ['id_producto','nombre','descripcion','precio','pedido_id_pedido'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedidos()
    {
        return $this->hasOne('App\Models\Pedido', 'id_pedido', 'pedido_id_pedido');
    }
    
}
