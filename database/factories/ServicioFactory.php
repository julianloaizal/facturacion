<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServicioFactory extends Factory
{
    protected $model = Servicio::class;

    public function definition()
    {
        return [
			'id_servicio' => $this->faker->name,
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'proveedor' => $this->faker->name,
			'precio' => $this->faker->name,
			'pedido_id_pedido' => $this->faker->name,
			'pedido_cliente_id_vendedor' => $this->faker->name,
        ];
    }
}
