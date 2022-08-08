<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ExamResource extends JsonResource
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
        $questions = $this->examQuestions() ? $this->examQuestions()->inRandomOrder()->get() : null;
        $questions = $questions ? AnswerdQuestionCollection::only($questions, ['question', 'answer']) : [];


        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'time' => $this->time,
            'dynamic' => $this->dynamic,
            'publisher' => $this->publisher ? UserResource::only($this->publisher, ['id', 'name', 'email', 'phoneNumber', 'parentPhoneNumber', 'balance', 'role', 'grade', 'governorate']) : null,
            'publisherName'=>$this->publisher->name,
            'part' => $this->part ? PartResource::only($this->part, ['name','description']) : null,
            'lecture' => $this->lecture ? LectureResource::only($this->lecture, []) : null,
            'dynamicExams' => $this->dynamicExams ? DynamicExamCollection::only($this->dynamicExams, ['id', 'question', 'answer']) : null,
            'questions' => $questions,
            'passedExam' => $this->passedExam ? PassedExamResource::only($this->passedExam, []) : null,

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
