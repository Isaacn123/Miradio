<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;

class PostRadioResource extends JsonResource
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
            'category_name' => Category::where('id',$this-> category_id)->first()->category_name,
            'radio_name' => $this->radio_name,
            'radio_image' => $this->radio_image,
            'radio_url' => $this->radio_url,
        ];
    }
}
