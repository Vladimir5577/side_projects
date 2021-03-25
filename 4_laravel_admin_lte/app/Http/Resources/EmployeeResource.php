<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'photo' => $this->photo,
            'name' => $this->name,
            'position' => $this->position->name,
            'date' => $this->date->isoFormat('DD.MM.YY'),
            'phone' => $this->phone,
            'email' => $this->email,
            'salary' => "$$this->salary",
        ];
    }
}
