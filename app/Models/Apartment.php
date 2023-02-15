<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelFlags\Models\Concerns\HasFlags;
use App\Traits\ApartmentRelationships;

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
  
}
