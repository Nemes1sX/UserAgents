<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Interfaces\IUserRepository;
use App\Models\Agent;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

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
    public function index() : AnonymousResourceCollection
    {
        $users = $this->users->index();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request) : JsonResource
    {
        $user = $this->users->create($request->agent_id, $request->age, $request->address, $request->phone,
            $request->name, $request->email, $request->password);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) : JsonResource
    {
        $user = $this->users->show($user);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user) : JsonResource
    {
        $user = $this->users->update($user, $request->age, $request->agentId, $request->address, $request->phone,
            $request->username, $request->email, $request->password);

        return new UserResource($user);
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
