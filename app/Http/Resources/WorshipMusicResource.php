<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class WorshipMusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'music_id' => $this->id,
            'category_id' => $this-> category_id,
            'category_name' => Category::where('id',$this->category_id)->first()->category_name,
            'music_name' => $this->music_name,
            'music_image' => $this->music_image,
            'music_url' => $this->music_url,
            'featured' => $this->featured,
        ];
    }
}
