<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class LessonResource extends JsonResource
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
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->exam):
            $parameters[] = 'exam';
            $parameters[] = 'minPercentage';
        endif;
        $data = [
            'title'=>$this->title,
            'url'=>$this->url,
            'duration'=>$this->duration,
            'type'=>$this->type,
            'semester'=>$this->semester,
            'description'=>$this->description,
            'exam'=>new ExamResource($this->exam),
            'minPercentage'=>$this->min_percentage,
            'part'=>new PartResource($this->part),
            'lecture'=>new LectureResource($this->lecture),
        ];
        return Arr::only($data,$this->parameters);    }
}
