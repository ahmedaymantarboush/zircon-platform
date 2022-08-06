<?php

namespace App\Http\Resources;

use CustomResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ChoiceResource extends JsonResource
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
            'question'=>$this->question ? QuestionResource::only($this->question,['id','name','image','video','audio','type','explanation','level','gradeId','grade','part','owner']) : null,
            'name'=>$this->name,
            'image'=>$this->image,
            'video'=>$this->video,
            'audio'=>$this->audio,
            'correct'=>$this->correct,
        ];
        if (count($this->parameters)) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
