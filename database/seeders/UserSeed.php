<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::factory(20)->create([
            'phone' => $faker->numerify('###-###-####'),
            'age' => $faker->numberBetween(18, 80),
            'agent_id' => $faker->unique()->numberBetween(1, Agent::count())
        ]);
    }
}
