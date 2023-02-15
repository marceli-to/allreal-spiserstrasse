<?php
namespace App\Traits;
use App\Models\Role;

trait UserRelationships
{
  public function roles()
  {
    return $this->belongsToMany(Role::class);
  }
}