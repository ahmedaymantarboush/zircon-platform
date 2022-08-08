<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class UserResource extends JsonResource
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
            'createdLectures'=>$this->createdLectures ? LectureCollection::only($this->createdLectures,[]) : null,
            'ownedLectures'=>$this->ownedLectures ? LectureCollection::only($this->ownedLectures,[]) : null,
            'exams'=>$this->exams ? ExamCollection::only($this->exams,[]) : null,
            'answerdQuestions'=>$this->answerdQuestions ? AnswerdQuestionCollection::only($this->answerdQuestions,[]) : null,
            'subjects' => $this->subjects && $this->role->number < 4 ? SubjectCollection::only($this->subjects,[]) : null,
            'passedExams'=>$this->passedExams ? PassedExamCollection::only($this->passedExams,[]) : null,
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
