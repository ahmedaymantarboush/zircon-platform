<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class AnswerdQuestionResource extends JsonResource
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
            'answer' => $this->answer,
            'correct' => $this->correct,
            'question' => $this->question ? QuestionResource::only($this->question,['id', 'name', 'image', 'video', 'audio', 'type', 'choices']) : null,
            'exam'=>$this->exam ? ExamResource::only($this->exam,['id','name','image','video','audio','type','explanation','level','gradeId','grade','part','owner']) : null,
            'user'=>$this->user ? UserResource::only($this->user,['id','name','image','video','audio','type','explanation','level','gradeId','grade','part','owner']) : null,
        ];
        if (count($this->onlyParameters) > 0) {
            return Arr::only($data, $this->onlyParameters);
        }elseif (count($this->exceptParameters) > 0) {
            return Arr::only($data, $this->exceptParameters);
        } else {
            return $data;
        }
    }
}
