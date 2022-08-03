<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MonthCollection extends ResourceCollection
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
    ];
    public static function only($resource, $Params)
    {
        $instance = new Self($resource);
        $instance->parameters = $Params;
        return $instance;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return MonthResource::collection($this->collection,$this->parameters);
    }
}
