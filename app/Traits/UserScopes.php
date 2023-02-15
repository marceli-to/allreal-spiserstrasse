<?php
namespace App\Traits;
use App\Models\Role;

trait UserScopes
{

 /**
  * Scope a query to only include users with role 'admin'.
  *
  * @param  \Illuminate\Database\Eloquent\Builder  $query
  * @return \Illuminate\Database\Eloquent\Builder
  */
  public function scopeAdmins($query)
  {
    return $query->whereHas('roles', function ($q) {
      $q->where('role_id', Role::ADMIN);
    });
  }

  /**
  * Scope a query to only include users with role 'admin'.
  *
  * @param  \Illuminate\Database\Eloquent\Builder  $query
  * @return \Illuminate\Database\Eloquent\Builder
  */
  public function scopeEditors($query)
  {
    return $query->whereHas('roles', function ($q) {
      $q->where('role_id', Role::EDITOR);
    });
  }
  
}