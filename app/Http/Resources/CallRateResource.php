<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CallRateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'iso'       =>  $this->iso,
            'name'      =>  $this->name,
            'dialcode'  =>  $this->dialcode,
            'cost'      =>  $this->cost,
            'rate'      =>  $this->call_rate,
        ];
    }
}
