<?php

namespace App\Http\Resources\Data;

use App\Utils\RequestUtils;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Data\articleDataCollection;

class receiptsListCollection extends JsonResource
{
    public function toArray($request)
    {
        
        $mapped = [
            'receipts_id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status,
            'fecha' => $this->created_at,
        ];

        $mapped['cliente'] =[
            'id' => $this->client->id,
            'name' =>$this->client->name,
            'dni' =>$this->client->dni,
            'type_client' =>$this->client->type_client
        ];

        $mapped['articles'] = articleDataCollection::collection($this->articlesReceipts);

        return $mapped;
    }
}
