<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class MonthResource extends JsonResource
{

    private $parameters = [
        'title',
        'semester',
        'shortDescription',
        'description',
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
    ];
    public function __construct($resource,$onlyParams)
    {
        parent::__construct($resource);
        $this->parameters = $onlyParams;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $owner = $this->whenLoaded('owner')->name;
        $data = [
            'title'=>$this->title,
            'semester'=>$this->semester,
            'shortDescription'=>$this->short_description,
            'description'=>$this->description,
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
            'owner'=>$owner,
        ];
        return Arr::only($data,$this->parameters);
    }
}
