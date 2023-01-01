<?php

namespace App\Http\Resources;

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
            'id' => $this->first_name,
            'first_name' => $this->first_name,
            'last_name' => $this->first_name,
            'email' => $this->email,
            'role_id' => $this->role ? $this->role->id : null,
            'role_name' => $this->role ? $this->role->name : null,
        ];
    }
}
