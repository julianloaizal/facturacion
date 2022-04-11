<?php

namespace Database\Factories;

use App\Models\Envio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EnvioFactory extends Factory
{
    protected $model = Envio::class;

    public function definition()
    {
        return [
			'id_envio' => $this->faker->name,
			'estado' => $this->faker->name,
			'nombre_emisor' => $this->faker->name,
			'direccion_emisor' => $this->faker->name,
			'nombre_receptor' => $this->faker->name,
			'direcccion_receptor' => $this->faker->name,
			'fecha_envio' => $this->faker->name,
			'fecha_estimada' => $this->faker->name,
			'completada' => $this->faker->name,
			'prioridad' => $this->faker->name,
			'pedido_id_pedido' => $this->faker->name,
			'pedido_cliente_id_vendedor' => $this->faker->name,
        ];
    }
}
