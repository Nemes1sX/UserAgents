<?php


namespace App\Interfaces;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository {

    public function index() : Collection;

    public function show(User $user) : User;

    public function create(Agent $agent, int $age, string $address,
                           string $phone, string $username, string $email, string $password) : User;


    public function update(Agent  $agent, User $user, int $age, string $address, string $phone, string $username,
                           string $email, string $password): User;

    public function destroy(User $user) : void;

}


?>
