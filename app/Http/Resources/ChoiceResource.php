<?php

namespace App\Http\Resources;

use CustomResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ChoiceResource extends JsonResource
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
            'question'=>$this->question ? QuestionResource::only($this->question,['id','name','image','video','audio','type','explanation','level','gradeId','grade','part','owner']) : null,
            'name'=>$this->name,
            'image'=>$this->image,
            'video'=>$this->video,
            'audio'=>$this->audio,
            'correct'=>$this->correct,

            'createdAt'=>$this->created_at,
            'updatedAt'=>$this->updated_at,
         ];
        if (count($this->onlyParameters)) {
            return Arr::only($data, $this->onlyParameters);
        }elseif (count($this->exceptParameters) > 0) {
            return Arr::except($data, $this->exceptParameters);
        } else {
            return $data;
        }
    }
}
