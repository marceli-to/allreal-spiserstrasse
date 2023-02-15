<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelFlags\Models\Concerns\HasFlags;
use App\Traits\ApartmentRelationships;
use App\Models\State;

class Apartment extends Model
{
  use SoftDeletes, HasFlags, ApartmentRelationships;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'number',
    'location',
    'rooms',
    'type',
    'street',
    'area',
    'area_basement',
    'area_exterior',
    'price'
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */

  protected $appends = [
    'state'
  ];

  public function getStateAttribute()
  {
    if ($this->hasFlag(State::SOLD))
    {
      return State::SOLD;
    }
    
    if ($this->hasFlag(State::RESERVED))
    {
      return State::RESERVED;
    }

    if ($this->hasFlag(State::AVAILABLE))
    {
      return State::AVAILABLE;
    }
  }
  
}
