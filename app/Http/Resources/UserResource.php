<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class UserResource extends JsonResource
{
    private $parameters = [
        'name',
        'email',
        'phone_number',
        'parent_phone_number',
        // 'image',
        'balance',
        'role',
        'grade',
        'governorate',
    ];

    public function only($params){
        $this->parameters = $params;

        return $this;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return Arr::only([
            'name'=>$this->name,
            'email'=>$this->email,
            'phoneNumber'=>$this->phone_number,
            'parentPhoneNumber'=>$this->parent_phone_number,
            // 'image',
            'balance'=>$this->balance,
            'role'=>$this->role,
            'grade'=>$this->grade->name,
            'governorate'=>$this->governorate->name,
        ],$this->parameters);
    }
}
