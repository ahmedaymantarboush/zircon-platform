<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionCollection extends ResourceCollection
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
                return QuestionResource::only($item, $this->onlyParameters);
            });
        }elseif (count($this->exceptParameters)) {
            return $this->collection->map(function ($item) {
                return QuestionResource::except($item, $this->exceptParameters);
            });
        }else {
            return QuestionResource::collection($this->collection);
        }
    }
}
