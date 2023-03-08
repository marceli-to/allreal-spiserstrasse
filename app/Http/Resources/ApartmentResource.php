<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\State;

class ApartmentResource extends JsonResource
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
      'number' => $this->number,
      'rooms' => $this->rooms,
      'type' => $this->type,
      'street' => $this->street,
      'location' => $this->location,
      'area' => $this->area,
      'area_basement' => $this->area_basement,
      'area_exterior' => $this->area_exterior,
      'price' => $this->price,
      'state' => $this->state,
      // 'state' => [
      //   'id' => $this->state,
      //   'key' => $this->state == State::SOLD ? 'sold' : ($this->state == State::RESERVED ? 'reserved' : 'available'),
      //   'value' => $this->state == State::SOLD ? 'verkauft' : ($this->state == State::RESERVED ? 'reserviert' : 'frei')
      // ],
      'floor' => collect($this->floors->pluck('acronym')->all())->implode(', '),
    ];
  }
}
