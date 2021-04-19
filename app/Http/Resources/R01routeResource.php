<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class R01routeResource extends JsonResource
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
			'id' => $this->id,
			'title' => $this->title,
			'scheme_id' => $this->scheme_id,
			'scheme2_id' => $this->scheme2_id,
		];
        //return parent::toArray($request);
    }
}
