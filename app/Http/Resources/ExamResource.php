<?php

namespace App\Http\Resources;

use App\Models\Question;
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
        $questions = [];
        if ($this->dynamic_questions):
            foreach (explode(';',$this->dynamic_questions) as $questionsData):
                $questionsData = str_contains($questionsData, ',') ? explode(',',$questionsData) : false;
                if ($questionsData):
                    foreach (Question::where('level',intval($questionsData[1]))->inRandomOrder()->take($questionsData[0])->get() as $question):
                        $questions[] = $question;
                    endforeach;
                endif;
                shuffle($questions);
            endforeach;
        else:
            $questions = $this->questions()->inRandomOrder()->get();
        endif;
        $questions = new QuestionCollection($questions);

        $data = [
            'id'=>$this->id,
            'title'=>$this->title,
            'user'=>$this->user_id,
            'part'=> new PartResource($this->part),
            'lecture'=>new LectureResource($this->lecture),
            'questions'=>$questions,
        ];
        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
