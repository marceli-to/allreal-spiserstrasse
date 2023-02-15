<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  
  protected $fillable = [
    'role_id',
    'user_id'
  ];
}
