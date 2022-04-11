<?php

namespace Database\Factories;

use App\Models\Pago;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PagoFactory extends Factory
{
    protected $model = Pago::class;

    public function definition()
    {
        return [
			'id_pago' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'otros_detalles' => $this->faker->name,
			'factura_id_factura' => $this->faker->name,
			'factura_cliente_id_vendedor' => $this->faker->name,
			'factura_pedido_id_pedido' => $this->faker->name,
			'factura_pedido_cliente_id_vendedor' => $this->faker->name,
        ];
    }
}
