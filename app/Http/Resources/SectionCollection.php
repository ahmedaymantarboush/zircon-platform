<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SectionCollection extends ResourceCollection
{
    private $onlyParameters = [];
    public static function only($resource, $Params)
    {
        $instance = new Self($resource);
        $instance->onlyParameters = $Params;
        return $instance;
    }

    private $exceptParameters = [];
    public static function except($resource, $Params)
    {
        $instance = new Self($resource);
        $instance->exceptParameters = $Params;
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
        if (count($this->onlyParameters)) {
            return $this->collection->map(function ($item) {
                return SectionResource::only($item, $this->onlyParameters);
            });
        }elseif (count($this->exceptParameters)) {
            return $this->collection->map(function ($item) {
                return SectionResource::except($item, $this->exceptParameters);
            });
        }else {
            return SectionResource::collection($this->collection);
        }
    }
}
