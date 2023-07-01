<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Radio;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryRadioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cid' => $this->id,
            'category_name' => $this->category_name,
            'category_image' => $this->category_image,
            'featured' => $this->featured,
            'radio_count' => Radio::where('featured',1)->count()
        ];
    }
}
