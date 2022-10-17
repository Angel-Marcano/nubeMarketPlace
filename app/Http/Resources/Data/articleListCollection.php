<?php

namespace App\Http\Resources\Data;

use App\Utils\RequestUtils;
use Illuminate\Http\Resources\Json\JsonResource;

class articleListCollection extends JsonResource
{
    public function toArray($request)
    {
        $mapped = [
            'article_id' => $this->article_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'name' => $this->article->name,
            'descripcion' => $this->article->descripcion,
            'image_url' => $this->article->image_url,
            'almacen' => $this->store->name,
            'almacen_id' => $this->store->id,
        ];

        return $mapped;
    }
}
