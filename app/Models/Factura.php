<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'facturas';

    protected $fillable = ['id_factura','fecha_vencimiento','estado','cliente_id_vendedor','pedido_id_pedido','pedido_cliente_id_vendedor'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id_vendedor', 'cliente_id_vendedor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modoPagos()
    {
        return $this->hasMany('App\Models\ModoPago', 'factura_id_factura', 'id_factura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedido()
    {
        return $this->hasOne('App\Models\Pedido', 'id_pedido', 'pedido_id_pedido');
    }
    
    
}
