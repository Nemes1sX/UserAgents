<?php


namespace App\Interfaces;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository {

    public function index() : Collection;

    public function show(User $user) : User;

    public function create(int $agentId, int $age, string $address,
                           string $phone, string $username, string $email, string $password) : User;


    public function update(User $user, int $agentId, int $age, string $address, string $phone, string $name,
                           string $email, string $password): User;

    public function destroy(User $user) : void;

}


?>
