<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
            'phone' => $this->Phone,
            'birth' => $this->Birth,
            'image' => $this->Image,
            'points' => $this->Points,
            'status' => $this->Status,
            'is_active' => $this->is_Active,
        ];
    }
}
