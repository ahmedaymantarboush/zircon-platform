<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class LectureResource extends JsonResource
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
            'title'=>$this->title,
            'semester'=>$this->semester,
            'shortDescription'=>$this->short_description,
            'description'=>$this->description,
            'lessonsCount'=>count($this->lessons),
            'published'=>$this->published,
            'promotinalVideoUrl'=>$this->promotinal_video_url,
            'poster'=>$this->poster,
            'metaKeywords'=>$this->meta_keywords,
            'metaDescription'=>$this->meta_description,
            'slug'=>$this->slug,
            'price'=>$this->price,
            'finalPrice'=>getPrice($this),
            'discountExpiryDate'=>$this->discount_expiry_date,
            'time'=>$this->time,
            'totalQuestionsCount'=>$this->total_questions_count,
            'subject'=>$this->subject->name,
            'gradeId'=>$this->grade_id,
            'grade'=>$this->grade->name,
            'publisher'=>$this->publisher ? new UserResource($this->publisher,['id','name','email','phoneNumber','parentPhoneNumber','balance','role','grade','governorate']) : null,
            'owners'=>$this->owners ? new UserCollection($this->owners,['id','name','email','phoneNumber','parentPhoneNumber','balance','role','grade','governorate']) : null,
            'ownersCount'=>count($this->owners),
            'sections'=>$this->sections ? new SectionCollection($this->sections()->orderBy('order')->get()) : null,
            'parts'=>$this->parts ? new PartCollection($this->parts) : null,
        ];

        if (count($this->parameters) > 0) {
            return Arr::only($data, $this->parameters);
        } else {
            return $data;
        }
    }
}
