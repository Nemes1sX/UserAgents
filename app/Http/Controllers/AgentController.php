<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgentsResource;
use App\Models\Agent;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AgentController extends Controller
{
    public function __invoke() : AnonymousResourceCollection {
        return AgentsResource::collection(Agent::all());
    }
}
