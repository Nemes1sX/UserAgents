<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Agent;
use Faker\Generator as Faker;


class AgentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 10; $i++) {
            Agent::create([
                'username' => strval(rand(100000, 999999)),
            ]);
        }
    }
}
