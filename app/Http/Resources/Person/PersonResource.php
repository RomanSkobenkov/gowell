<?php

namespace App\Http\Resources\Person;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // $this здесь - это Person
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'job' => $this->job,
        ];
    }
}
