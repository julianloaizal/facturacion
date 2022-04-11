<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pagos';

    protected $fillable = ['id_pago','descripcion','otros_detalles','factura_id_factura','factura_cliente_id_vendedor','factura_pedido_id_pedido','factura_pedido_cliente_id_vendedor'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function factura()
    {
        return $this->hasOne('App\Models\Factura', 'id_factura', 'factura_id_factura');
    }
    
  
    
    
}
