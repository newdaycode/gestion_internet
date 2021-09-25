<?php

namespace Database\Factories;

use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class SolicitudFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solicitud::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //hola mundo como estas
        //hola-mundo-como-estas

        $name = $this->faker->name;

        return [
            'cd_rif' => $this->faker->randomNumber(2),
            'nombre_solicitante' => $name,
            'movil' => $this->faker->phoneNumber,
            'fijo' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'slug' => Str::slug($name),
            'ubicacion' => $this->faker->city,
            'observaciones' => $this->faker->word(30),
            'antena' => $this->faker->name,
            'estado' => $this->faker->randomElement([Solicitud::PENDIENTE, Solicitud::FACTIBLE, Solicitud::NO_FACTIBLE]),
            'users_id' => User::all()->random()->id,
        ];
    }
}
