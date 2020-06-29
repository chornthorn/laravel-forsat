<?php

namespace App\Http\Resources;

use App\Http\Resources\Lookups\Category;
use App\Http\Resources\Lookups\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class Opportunity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => new Category($this->category),
            'country' => new Country($this->country),
            'deadline' => $this->deadline->toDayDateTimeString(),
            'organizer' => $this->organizer,
            'createdBy' => new User($this->user),
            'createdAt' => $this->created_at->toDayDateTimeString(),
            'updatedAt' => $this->updated_at->toDayDateTimeString(),
        ];
    }
}
