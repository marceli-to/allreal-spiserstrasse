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
    'price',
    'iso_code_view_1',
    'iso_code_view_2',
    'iso_code_view_3',
    'iso_code_view_4',
    'state',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */

  protected $appends = [
    'state'
  ];

  public function getStateStrAttribute()
  {
    if ($this->state == 1)
    {
      return State::AVAILABLE;
    }
    
    if ($this->state == 2)
    {
      return State::RESERVED;
    }

    if ($this->state == 3)
    {
      return State::SOLD;
    }
  }

  public function getTitleAttribute()
  {
    if ($this->type == 'Atelier')
    {
      $title = 'Atelier ' . $this->number;
    }
    else
    {
      $title  = $this->rooms . ' Zimmer-Wohnung';
      $title .= ', ' . collect($this->floors->pluck('acronym')->all())->implode('-');
      $title .= ', ' . $this->number;
    }
    return $title;
  }

  public function getSlugAttribute()
  {
    if ($this->type == 'Atelier')
    {
      $slug = 'atelier-' . $this->number;
    }
    else
    {
      $slug  = $this->rooms . '-zimmer-wohnung';
      $slug .= '-' . strtolower(collect($this->floors->pluck('acronym')->all())->implode('-'));
      $slug .= '-' . $this->number;
    }
    return $slug;
  }

  public function getStateArrayAttribute()
  {
    return [
      'key' => $this->stateStr,
      'value' => $this->stateStr == State::SOLD ? 'verkauft' : ($this->stateStr == State::RESERVED ? 'reserviert' : 'frei'),
      'order' => $this->stateStr == State::SOLD ? 3 : ($this->stateStr == State::RESERVED ? 2 : 1),
    ];
  }
  
  public function getFloorArrayAttribute()
  {
    return [
      'label' => collect($this->floors->pluck('acronym')->all())->implode(', '),
      'order' => collect($this->floors->pluck('order')->all())->min(),
    ];
  }

}
