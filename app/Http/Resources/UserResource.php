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
            'name' => $this->name,
            'email' => $this->email,
            'phoneNumber' => $this->phone_number,
            'parentPhoneNumber' => $this->parent_phone_number,
            'balance' => $this->balance,
            'role' => $this->role->title,
            'grade' => $this->grade->name,
            'governorate' => $this->governorate->name,
            'code' => $this->code,
            'center' => $this->center->name,
            'createdLectures' => $this->createdLectures ? LectureCollection::except($this->createdLectures, ['publisher', 'owners']) : null,
            'ownedLectures' => $this->ownedLectures ? LectureCollection::except($this->ownedLectures, ['owners', 'publisher']) : null,
            'exams' => $this->exams ? ExamCollection::except($this->exams, ['publisher','lecture']) : null,
            'answerdQuestions' => $this->answerdQuestions ? AnswerdQuestionCollection::except($this->answerdQuestions, ['user']) : null,
            'subjects' => $this->subjects && $this->role->number < 4 ? SubjectCollection::except($this->subjects, ['user']) : null,
            'passedExams' => $this->passedExams ? PassedExamCollection::except($this->passedExams, ['user']) : null,

            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
        if (count($this->onlyParameters) > 0) {
            return Arr::only($data, $this->onlyParameters);
        } elseif (count($this->exceptParameters) > 0) {
            return Arr::except($data, $this->exceptParameters);
        } else {
            return $data;
        }
    }
}
