<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class SectionItemResource extends JsonResource
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
            'section' => in_array('section', $this->onlyParameters) && count($this->onlyParameters) && !in_array('section', $this->exceptParameters,) ? new SectionCollection($this->section) : null,
            'order' => $this->order,
            'item' => null,

            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
        if ($type == 'lesson') :
            $data['item'] = $this->lesson ? LessonResource::only($this->lesson, ['title', 'url', 'duration', 'type', 'semester', 'description', 'exam', 'minPercentage', 'part',]) : null;
        elseif ($type == 'exam') :
            // $user = apiUser();
            // $passedExam = $this->exam->passedExams()->where('user_id',$user->id)->first();
            // if (!$passedExam):
            //     if ($user):
            //         $this->exam->startExam();
            //     endif;
            // endif;
            // $data['item'] = $this->exam ? PassedExamResource::only($passedExam, ['exam', 'percentage', 'exam_started_at', 'exam_ended_at', 'finished']) : null;

            $data['item'] = $this->exam ? ExamResource::only($this->exam, ['id','title']) : null;

        endif;

        if (count($this->onlyParameters) > 0) {
            return Arr::only($data, $this->onlyParameters);
        } elseif (count($this->exceptParameters) > 0) {
            return Arr::except($data, $this->exceptParameters);
        } else {
            return $data;
        }
    }
}
