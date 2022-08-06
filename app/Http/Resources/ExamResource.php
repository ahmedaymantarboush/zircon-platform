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
        $opened = false;
        if ($questions) :
            $questions = AnswerdQuestionCollection::only($questions, ['id', 'question', 'answer']);
            $opened = true;
        else :
            $questions = $questions ? QuestionCollection::only($questions, ['id', 'name', 'image', 'video', 'audio', 'type', 'choices']) : [];
        endif;
        $data = [
            'id' => $this->id,
            'opened' => $opened,
            'title' => $this->title,
            'remainingTime' => $opened && $this->openedExams()->where('user_id',apiUser()->id)->first() ? $this->openedExams()->where('user_id',apiUser()->id)->first()->remaining_time : null,
            'publisher' => $this->publisher ? UserResource::only($this->publisher, ['id', 'name', 'email', 'phoneNumber', 'parentPhoneNumber', 'balance', 'role', 'grade', 'governorate']) : null,
            'part' => $this->part ? new PartResource($this->part) : null,
            'lecture' => $this->lecture ? new LectureResource($this->lecture) : null,
            'questions' => $questions,
        ];

        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
