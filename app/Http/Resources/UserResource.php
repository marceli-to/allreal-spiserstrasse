<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
  public static $wrap = null;
  
  protected $showSensitiveAttributes = false;

  /**
   * Allow sensitive information to be returned.
   */
  public function withSensitiveAttributes(bool $value = true): self
  {
    $this->showSensitiveAttributes = $value;
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
    return [
      'id' => $this->id,
      'firstname' => $this->firstname,
      'name' => $this->name,
      'email' => $this->email,
      $this->mergeWhen($this->showSensitiveAttributes, [
        'is_admin' => $this->isAdmin() ? true : false,
      ]),
    ];
  }
}
