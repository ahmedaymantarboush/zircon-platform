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

    private $exceptParameters = ['description', 'createdAt', 'updatedAt'];
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
            'id' => $this->id,
            'order' => $this->order,
            'title' => $this->title,
            'description' => $this->description,
            'time' => $this->time,
            'totalQuestionsCount' => $this->total_questions_count,
            'examsCount' => count($this->items()->where('exam_id', '!=', null)->get()),
            'lessonsCount' => count($this->items()->where('lesson_id', '!=', null)->get()),
            'items' => count($this->items) ? SectionItemCollection::only($this->items()->orderBy('order')->get(), ['type', 'order', 'item']) : null,

            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
        if (count($this->onlyParameters) > 0) {
            return Arr::only($data, $this->onlyParameters);
        } else
        if (count($this->exceptParameters) > 0) {
            return Arr::except($data, $this->exceptParameters);
        } else {
            return $data;
        }
    }
}
