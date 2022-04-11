<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pedidos';

    protected $fillable = ['id_pedido','medio_pago','fecha_creacion','cantidad_producto','cantidad_servicio','vendedor_id_vendedor','cliente_id_vendedor'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function envios()
    {
        return $this->hasMany('App\Models\Envio', 'pedido_id_pedido', 'id_pedido');
    }
    
 

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas()
    {
        return $this->hasMany('App\Models\Factura', 'pedido_id_pedido', 'id_pedido');
    }
    

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'pedido_id_pedido', 'id_pedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->hasMany('App\Models\Servicio', 'pedido_id_pedido', 'id_pedido');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vendedore()
    {
        return $this->hasOne('App\Models\Vendedore', 'id_vendedor', 'vendedor_id_vendedor');
    }
    
}
