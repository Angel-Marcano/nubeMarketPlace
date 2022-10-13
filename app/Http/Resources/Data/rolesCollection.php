<?php

namespace App\Http\Resources\Data;

use App\Utils\RequestUtils;
use Illuminate\Http\Resources\Json\JsonResource;

class rolesCollection extends JsonResource
{
    public function toArray($request)
    {
        /** @var \App\Models\roles $this */
       
       // dd($this);
        $mapped = [
            'module' => $this->module,
            'level' => $this->level,
           // 'nombre' => $this->almacen
        ];

        return $mapped;
    }
}
