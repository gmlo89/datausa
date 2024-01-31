<?php

namespace App\Http\Resources\Population;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordsAvgResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'avg' => round($this->populations()->avg('value')),
        ];
    }
}
