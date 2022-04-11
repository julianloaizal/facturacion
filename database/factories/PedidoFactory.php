<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition()
    {
        return [
			'id_pedido' => $this->faker->name,
			'medio_pago' => $this->faker->name,
			'fecha_creacion' => $this->faker->name,
			'cantidad_producto' => $this->faker->name,
			'cantidad_servicio' => $this->faker->name,
			'vendedor_id_vendedor' => $this->faker->name,
			'cliente_id_vendedor' => $this->faker->name,
        ];
    }
}
