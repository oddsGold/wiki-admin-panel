<?php


namespace App\Http\Resources\Form;


use App\Http\Resources\BaseResource;

class BuyResource extends BaseResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->filtrateFields([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'edrpou' => $this->edrpou,
            'orgName' => $this->orgName,
            'type' => $this->type,
            'accountable' => $this->accountable,
            'question' => $this->question,
            'created_at' => $this->created_at
        ]);
    }
}
