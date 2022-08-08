<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class PassedExamResource extends JsonResource
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
        /*

        */
        $data = [
            'user' => UserResource::only($this->resource->user,['name','phoneNumber','parentPhoneNumber','grade','governorate','code','center']),
            'exam'=> ExamResource::only($this->resource->exam, ['title','questions']),
            'percentage' => $this->percentage,
            'examStartedAt' => $this->exam_started_at,
            'examEndedAt' => $this->exam_ended_at,
            'finished' => $this->finished,
        ];
        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
