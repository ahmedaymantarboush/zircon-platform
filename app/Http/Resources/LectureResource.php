<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class LectureResource extends JsonResource
{

    private $parameters = [
        'title',
        'semester',
        'shortDescription',
        'description',
        'lessonsCount',
        'published',
        'promotinalVideoUrl',
        'poster',
        'metaKeywords',
        'metaDescription',
        'slug',
        'price',
        'finalPrice',
        'discountExpiryDate',
        'duration',
        'totalQuestionsCount',
        'subject',
        'gradeId',
        'grade',
        'owner',
        'sections'
    ];
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
            'finalPrice'=>$this->final_price,
            'discountExpiryDate'=>$this->discount_expiry_date,
            'duration'=>$this->duration,
            'totalQuestionsCount'=>$this->total_questions_count,
            'subject'=>$this->subject->name,
            'gradeId'=>$this->grade_id,
            'grade'=>$this->grade->name,
            'owner'=>$this->owner->name,
            'sections'=>$this->sections
        ];
        return Arr::only($data,$this->parameters);
    }
}
