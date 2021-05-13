<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //$this->faker->name,
            'user_id' => $this->faker->numberBetween(1,10),
            'agencia' => $this->faker->name,
            'despachante' => $this->faker->name,
            'consolidacion' => $this->faker->city,
            'destino' => $this->faker->city,
            'contenedores' => $this->faker->numberBetween(1,1000),
            'descripcion' => $this->faker->text(300),
            'pedido_nro' => $this->faker->numberBetween(10000,100000),
            'semana_salida' => $this->faker->date('Y').'-W'.$this->faker->numberBetween(1,52),
            'fecha_cortedocumental' => $this->faker->date('Y-m-d'),
            'fecha_cortefisico' => $this->faker->date('Y-m-d'),
            'barco_nombre' => $this->faker->name,
            'barco_contenedores' => $this->faker->numberBetween(1,1000),
            'barco_nro_contenedor' => $this->faker->numberBetween(10000,100000),
            'barco_nro_remito' => $this->faker->numberBetween(10000,1000000),
            'barco_nro_booking' => $this->faker->numberBetween(10000,1000000),
            'fecha_destino' => $this->faker->date('Y-m-d'),
            'estado' => $this->faker->numberBetween(1,3),
        ];
    }
}
