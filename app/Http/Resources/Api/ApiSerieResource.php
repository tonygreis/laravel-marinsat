<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiSerieResource extends JsonResource
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
            'tmdb_id' => $this->tmdb_id,
            'title' => $this->name,
            'slug' => $this->slug,
            'poster' => $this->poster_path,
            'visits' => $this->visits
        ];
    }
}
