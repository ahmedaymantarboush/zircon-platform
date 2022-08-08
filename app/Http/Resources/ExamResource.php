<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ExamResource extends JsonResource
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
        $questions = $this->examQuestions() ? $this->examQuestions()->inRandomOrder()->get() : null;
        $questions = $questions ? AnswerdQuestionCollection::only($questions, ['id', 'question', 'answer']) : [];

        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'time' => $this->time,
            'dynamic' => $this->dynamic,
            'publisher' => $this->publisher ? UserResource::only($this->publisher, ['id', 'name', 'email', 'phoneNumber', 'parentPhoneNumber', 'balance', 'role', 'grade', 'governorate']) : null,
            'part' => $this->part ? PartResource::only($this->part, ['name','description']) : null,
            'lecture' => $this->lecture ? LectureResource::only($this->lecture, []) : null,
            'dynamicExams' => $this->dynamicExams ? DynamicExamCollection::only($this->dynamicExams, ['id', 'question', 'answer']) : null,
            'questions' => $questions,
            'passedExam' => $this->passedExam ? PassedExamResource::only($this->passedExam, []) : null,
        ];

        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
