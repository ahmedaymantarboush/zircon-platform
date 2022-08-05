<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class QuestionResource extends JsonResource
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
            'name'=>$this->name,
            'image'=>$this->image,
            'video'=>$this->video,
            'audio'=>$this->audio,
            'type'=>$this->type,
            'type'=>$this->type,
            'answer'=>$this->answer,
            'explanation'=>$this->explanation,
            'choices'=>$this->choices,
            'level'=>$this->level,
            'gradeId'=> $this->grade->id,
            'grade'=> $this->grade->name,
            'part'=>new PartResource($this->part),
            'owner'=>new UserResource($this->owner),
        ];
        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
