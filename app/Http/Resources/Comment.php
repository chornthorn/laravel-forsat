<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
            'comment' => $this->comment,
            'question' => new Question($this->question),
            'createdBy' => new User($this->createdBy),
            'createdAt' => $this->created_at->toDayDateTimeString(),
            'updatedAt' => $this->updated_at->toDayDateTimeString(),
        ];
    }
}
