<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class GovernorateResource extends JsonResource
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
        ];
        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
        return parent::toArray($request);
    }
}
