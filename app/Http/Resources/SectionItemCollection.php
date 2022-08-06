<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SectionItemCollection extends ResourceCollection
{
    private $parameters = [];
    public static function only($resource, $Params)
    {
        $instance = new Self($resource);
        $instance->parameters = $Params;
        return $instance;
    }
    // public function getData($resourceClass)
    // {
    //     if (count($this->parameters)) {
    //         return $this->collection->map(function ($item) {
    //             global $resourceClass;
    //             return $resourceClass::only($item, $this->parameters);
    //         });
    //     } else {
    //         return $resourceClass::collection($this->collection);
    //     }
    // }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (count($this->parameters)) {
            return $this->collection->map(function ($item) {
                return SectionItemResource::only($item, $this->parameters);
            });
        } else {
            return SectionItemResource::collection($this->collection);
        }
    }
}
