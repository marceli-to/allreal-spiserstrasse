<?php
namespace App\Traits;
use App\Models\Floor;

trait ApartmentRelationships
{
  public function floors()
  {
    return $this->belongsToMany(Floor::class);
  }
}