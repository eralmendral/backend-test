<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $fillable = ['id', 'title', 'article', 'is_published'];
    public function toArray($request)
    {
        // Response data format
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'article' => $this->article
        // ];

        return parent::toArray($request);
    }
}
