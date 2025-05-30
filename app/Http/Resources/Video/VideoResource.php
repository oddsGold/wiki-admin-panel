<?php


namespace App\Http\Resources\Video;


use App\Http\Resources\BaseResource;
use App\Http\Resources\Image\ImageResource;

class VideoResource extends BaseResource
{
    public function toArray($request)
    {
        return $this->filtrateFields([
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'user' => $this->user ? $this->user->login : null,
            'preview' => (new ImageResource($this->preview))->only(['id', 'url', 'name', 'path', 'created_at']),
            'created_at' => (string)date_custom_format($this->created_at),
            'updated_at' => (string)date_custom_format($this->updated_at),
        ]);
    }
}
