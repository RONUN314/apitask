<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Taskresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'taskdesc' => $this->taskdesc,
            'location' => $this->location,
            'percentage' => $this->percentage,
            'priority' => $this->priority,
            'type' => $this->type,
            'status' => $this->status,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'duration' => $this->duration,
            'created_at' => $this->created_at,
            'updated_at	' => $this->updated_at,
        ];
    }
}
