<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class UserResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'phoneNumber'=>$this->phone_number,
            'parentPhoneNumber'=>$this->parent_phone_number,
            'balance'=>$this->balance,
            'role'=>$this->role->title,
            'grade'=>$this->grade->name,
            'governorate'=>$this->governorate->name,
            'code'=>$this->code,
            'center'=>$this->center->name,
            'createdLectures'=>$this->createdLectures ? new LectureCollection($this->createdLectures) : null,
            'ownedLectures'=>$this->ownedLectures ? new LectureCollection($this->ownedLectures) : null,
            'exams'=>$this->exams ? new ExamCollection($this->exams) : null,
            'answerdQuestions'=>$this->answerdQuestions ? new AnswerdQuestionCollection($this->answerdQuestions) : null,
            'subjects' => $this->subjects && $this->role->number < 4 ? new SubjectCollection($this->subjects) : null,
            'passedExams'=>$this->passedExams ? new PassedExamCollection($this->passedExams) : null,
        ];
        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
