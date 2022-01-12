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

    public function create(Agent  $agent, int $age, string $address,
                           string $phone, string $username, string $email, string $password): User
    {
        $user = User::create([
            'age' => $age,
            'address' => $address,
            'email' => $email,
            'username' => $username,
            'password' => bcrypt($password),
            'phone' => $phone,
        ]);

        $agent->user()->save($user);

        return $user;
    }

    public function update(Agent  $agent, User $user, int $age, string $address, string $phone, string $username,
                           string $email, string $password): User
    {
        $user->age = $age;
        $user->address = $address;
        $user->email = $email;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->phone = $phone;

        $agent->user()->save($user);

        return $user;
    }

    public function destroy(User $user) : void
    {
        $user->agent()->delete();
        $user->delete();
    }
}
