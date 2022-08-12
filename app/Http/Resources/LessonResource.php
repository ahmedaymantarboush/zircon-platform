<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class LessonResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'urls' => getVideoUrl($this->url)['videos'],
            'time' => $this->time,
            'type' => $this->type,
            'semester' => $this->semester,
            'description' => $this->description,
            'exam' => $this->exam ? ExamResource::only($this->exam, ['id', 'title', 'publisher', 'part', 'questions']) : null,
            'minPercentage' => $this->min_percentage,
            'part' => $this->part ? new PartResource($this->part) : null,
            'lecture' => $this->lecture ? new LectureResource($this->lecture) : null,

            'createdAt'=>$this->created_at,
            'updatedAt'=>$this->updated_at,
         ];
        if (count($this->onlyParameters) > 0) {
            return Arr::only($data, $this->onlyParameters);
        }elseif (count($this->exceptParameters) > 0) {
            return Arr::except($data, $this->exceptParameters);
        } else {
            return $data;
        }
    }
}
