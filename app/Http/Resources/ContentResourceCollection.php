<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContentResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request|null $request
     * @return array
     */
    public function toArray($request = null): array
    {
        return $this->collection->toArray();
    }
}
