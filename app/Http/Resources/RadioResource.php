<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RadioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'radio_id' => $this->id,
            'category_id' => $this-> category_id,
            'radio_name' => $this->radio_name,
            'radio_image' => $this->radio_image,
            'radio_url' => $this->radio_url,
            'featured' => $this->featured,
        ];
    }
}
