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
      'key' => $this->state,
      'value' => $this->state == State::SOLD ? 'verkauft' : ($this->state == State::RESERVED ? 'reserviert' : 'frei'),
      'order' => $this->state == State::SOLD ? 3 : ($this->state == State::RESERVED ? 2 : 1),
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
