<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CenterResource extends JsonResource
{

    private $parameters = [
        'title',
        'semester',
        'shortDescription',
        'description',
        'lessonsCounr',
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
            'name' => $this->name,
            'image' => $this->image,
            'governorate' => $this->governorate->name,
        ];
        return Arr::only($data,$this->parameters);
    }
}
