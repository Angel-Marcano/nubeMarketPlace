<?php

namespace App\Http\Resources\Data;

use App\Utils\RequestUtils;
use Illuminate\Http\Resources\Json\JsonResource;

class articleDataCollection extends JsonResource
{
    public function toArray($request)
    {
      
        $mapped = [
            'id' => $this->article_id,
            'count' => $this->count,
            'amount' => $this->amount,
            'total_mount' => $this->total_mount,
            'name' => $this->article->name,
            'descripcion' => $this->article->descripcion,
            'type' => $this->article->type,
            'image_url' => $this->article->image_url
        ];

        return $mapped;
    }
}
