<?php


namespace App\Interfaces;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository {

    public function index() : Collection;
}


?>
