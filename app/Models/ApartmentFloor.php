<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ApartmentFloor extends Pivot
{
   protected $fillable = [
    'apartment_id',
    'floor_id'
  ];
}
