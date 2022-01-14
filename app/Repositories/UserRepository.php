<?php

namespace App\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{
    public function index(): Collection
    {
        return User::with('agent')->get();
    }

    public function show(User $user) : User
    {
        return $user;
    }

    public function create(int $agentId, int $age, string $address = null,
                           string $phone, string $name, string $email, string $password = null): User
    {
        $user = User::create([
            'age' => $age,
            'agent_id' => $agentId,
            'address' => $address,
            'email' => $email,
            'name' => $name,
            'password' => bcrypt($password),
            'phone' => $phone,
        ]);


        return $user;
    }

    public function update(User $user, int $agentId = null, int $age = null, string $address = null, string $phone = null,
                           string $name = null, string $email = null, string $password = null): User
    {
        if ($agentId != $user->agent_id) {
            $agent = Agent::findOrFail($agentId);
            $agent->user()->save($user);
        }

        $user->age = $age ?? $user->age;
        $user->address = $address ?? $user->address;
        $user->email = $email ?? $user->email;
        $user->name = $name ?? $user->name;
        $user->password = bcrypt($password) ?? $user->password;
        $user->phone = $phone ?? $user->phone;

        $user->save();

        return $user;
    }

    public function destroy(User $user) : void
    {
        $agent = Agent::findOrFail($user->agent_id);
        $agent->user()->delete($user);

        $user->delete();
    }
}
