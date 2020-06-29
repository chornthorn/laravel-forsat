<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Favorite extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new User($this->user),
            'opportunity' => new Opportunity($this->opportunity),
            'createdAt' => $this->created_at->toDayDateTimeString(),
            'updatedAt' => $this->updated_at->toDayDateTimeString(),
        ];
    }
}
