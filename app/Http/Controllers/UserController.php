<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Interfaces\IUserRepository;
use App\Models\Agent;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    protected $users;

    public function __construct(IUserRepository $users) {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : string
    {
        $user = $this->users->index();
        //dd($user);
        return UserResource::collection($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, Agent $agent) : string
    {
        $user = $this->users->create($agent, $request->age, $request->address, $request->phone, $request->username,
            $request->email, $request->password);

        return UserResource::collection($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) : string
    {
        $user = $this->users->show($user);

        return UserResource::collection($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user, Agent $agent) : string
    {
        $user = $this->users->update($agent, $user, $request->age, $request->address, $request->phone, $request->username,
            $request->email, $request->password);

        return UserResource::collection($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) : string
    {
        $this->users->destroy($user);

        return response()->json([
            'status' => 'success'
        ]);

    }
}
