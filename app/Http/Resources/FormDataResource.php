<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class FormDataResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  { 
    return [
      'id' => $this->id,
      'firstname' => $this->firstname,
      'name' => $this->name,
      'email' => $this->email,
      'phone' => $this->phone,
      'street' => $this->street,
      'street_number' => $this->street_number,
      'zip' => $this->zip,
      'city' => $this->city,
    ];
  }
}
