<?php
namespace App\Traits;
use App\Models\Floor;
use App\Models\ApartmentType;

trait ApartmentRelationships
{
  public function floors()
  {
    return $this->belongsToMany(Floor::class);
  }

  public function type()
  {
    return $this->belongsTo(ApartmentType::class);
  }
}