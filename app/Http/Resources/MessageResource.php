<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cid' => $this->cid,
            'title' => $this->title,
            'image_cover' => $this->image_cover,
            'stream_url' => $this->stream_url,
            'category' => $this->category,
            'audios' => $this->audios,
        ];
    }
}
