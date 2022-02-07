<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Admin::class;
    public function definition()
    {
        return [
            'id' => Str::uuid()->toString(),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'password' => bcrypt(12345678),
            'role_id'=>1,
        ];
    }
}
