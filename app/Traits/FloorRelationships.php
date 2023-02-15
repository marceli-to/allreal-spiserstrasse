<?php
namespace App\Traits;
use App\Models\Apartment;

trait FloorRelationships
{
  public function apartments()
  {
    return $this->belongsToMany(Apartment::class);
  }
}