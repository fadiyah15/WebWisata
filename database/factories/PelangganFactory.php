<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Ambil semua id pengguna yang ada
        $userIds = User::pluck('id')->toArray();

        return [
            'id_user' => $this->faker->randomElement($userIds),
            'nama_lengkap' => $this->faker->word,
            'no_hp' => $this->faker->regexify('[0-9]{12}'),
            'alamat' => $this->faker->word,
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
