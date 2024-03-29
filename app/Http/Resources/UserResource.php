<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'age' => $this->age,
            'address' => $this->address,
            'agent' => $this->agent->username,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d')
        ];
    }
}
