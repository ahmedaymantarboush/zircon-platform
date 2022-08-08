<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class QuestionResource extends JsonResource
{
    private $onlyParameters = [];
    public static function only($resource, $Params)
    {
        $instance = new Self($resource);
        $instance->onlyParameters = $Params;
        return $instance;
    }

    private $exceptParameters = ['created_at', 'updated_at'];
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
            'name'=>$this->name,
            'image'=>$this->image,
            'video'=>$this->video,
            'audio'=>$this->audio,
            'type'=>$this->type,
            'explanation'=>$this->explanation,
            'choices'=>$this->choices ? ChoiceCollection::only($this->choices,['name','image','video','audio']) : null,
            'level'=>$this->level,
            'gradeId'=> $this->grade->id,
            'grade'=> $this->grade->name,
            'part'=>$this->part ? new PartResource($this->part) : null,
            'publisher'=>$this->publisher ? new UserResource($this->publisher) : null,

            'createdAt'=>$this->created_at,
            'updatedAt'=>$this->updated_at,
         ];
        // dd(($this->choices));
        if (count($this->onlyParameters) > 0) {
            return Arr::only($data, $this->onlyParameters);

        }elseif (count($this->exceptParameters) > 0) {
                return Arr::except($data, $this->exceptParameters);
        } else {
            return $data;
        }
    }
}
