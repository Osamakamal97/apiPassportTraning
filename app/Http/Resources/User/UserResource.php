<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // if ($request->method() == 'GET')
        //     return [
        //         'id' => $this->id,
        //         'name' => $this->name,
        //         'email' => $this->email
        //     ];
        // else
            // return parent::toArray($request);


        return parent::toArray($request);
    }
}
