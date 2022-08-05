<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class TestimonialResource extends JsonResource
{
    private $parameters = [];
    public static function only($resource, $Params)
    {
        $instance = new Self($resource);
        $instance->parameters = $Params;
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
            'studenName'=>$this->studen_name,
            'image'=>$this->image,
            'degree'=>$this->degree,
            'content'=>$this->content,
        ];
        if (count($this->parameters)) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
