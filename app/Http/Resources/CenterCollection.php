<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CenterCollection extends ResourceCollection
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
            return $this->collection->map(function ($center) {
                return CenterResource::only($center,$this->parameters);
            });
        } else {
            return CenterResource::collection($this->collection);
        }
    }
}
