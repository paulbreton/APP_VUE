<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'terrain' => $this->terrain,
            'date' => $this->date,
            'users' => UserResource::collection($this->users),
            'visibility' => $this->visibility,
            'draft' => $this->draft,
            'organisateur' => UserResource::make($this->organisateur),
            'nb_players' => $this->nb_players,
        ];
    }
}
