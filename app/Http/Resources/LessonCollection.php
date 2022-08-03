<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LessonCollection extends ResourceCollection
{
    private $parameters = [
        'title',
        'url',
        'duration',
        'type',
        'semester',
        'description',
        'part',
    ];
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
        return LessonResource::collection($this->collection,$this->parameters);
    }
}
