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
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (count($this->parameters)) {
            return $this->collection->map(function ($sectionItem) {
                return SectionItemResource::only($sectionItem,$this->parameters);
            });
        } else {
            return SectionItemResource::collection($this->collection);
        }
    }
}
