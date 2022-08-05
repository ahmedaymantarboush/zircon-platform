<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class SectionItemResource extends JsonResource
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
        if ($this->lesson_id) :
            $type = 'lesson';
        elseif ($this->exam_id) :
            $type = 'exam';
        else :
            $type = 'undefined';
        endif;
        $data = [
            'id' => $this->id,
            'type' => $type,
            'section' => in_array('section', $this->parameters) && count($this->parameters) ? new SectionCollection($this->section) : null,
            'order' => $this->order,
            'item' => null,
        ];
        if ($type == 'lesson') :
            $data['item'] = new LessonResource($this->lesson);
        elseif ($type == 'exam') :
            $data['item'] = new ExamResource($this->exam);
        endif;

        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
