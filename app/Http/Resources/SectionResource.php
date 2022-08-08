<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class SectionResource extends JsonResource
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
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id'=>$this->id,
            'order'=>$this->order,
            'title'=>$this->title,
            'items'=>count($this->items) ? SectionItemCollection::only($this->items()->orderBy('order')->get(),['id', 'type','order','item']) : null,
        ];
        if (count($this->onlyParameters) > 0) {
            return Arr::only($data, $this->onlyParameters);
        } else {
            return $data;
        }
    }
}
