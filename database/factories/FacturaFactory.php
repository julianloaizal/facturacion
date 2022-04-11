<?php

namespace Database\Factories;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition()
    {
        return [
			'id_factura' => $this->faker->name,
			'fecha_vencimiento' => $this->faker->name,
			'estado' => $this->faker->name,
			'cliente_id_vendedor' => $this->faker->name,
			'pedido_id_pedido' => $this->faker->name,
			'pedido_cliente_id_vendedor' => $this->faker->name,
        ];
    }
}
