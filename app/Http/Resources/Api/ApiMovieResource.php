<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Admin\AdminCastResource;
use App\Http\Resources\Admin\AdminGenreResource;
use App\Http\Resources\Admin\AdminTagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiMovieResource extends JsonResource
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
            'title' => $this->title,
            'runtime' => $this->runtime,
            'rating' => $this->rating,
            'release_date' => $this->release_date,
            'lang' => $this->lang,
            'video_format' => $this->video_format,
            'is_public' => $this->is_public,
            'overview' => $this->overview,
            'poster_path' => $this->poster_path,
            'backdrop_path' => $this->backdrop_path,
            'slug' => $this->slug,
            'genres' => AdminGenreResource::collection($this->genres),
            'tags' => AdminTagResource::collection($this->tags),
            'casts' => AdminCastResource::collection($this->casts)
        ];
    }
}
