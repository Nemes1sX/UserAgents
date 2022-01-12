<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;


class AgentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agent::factory(10)->create();
    }
}
