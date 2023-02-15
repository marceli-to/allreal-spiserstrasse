<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public const ADMIN = 1;
  public const EDITOR = 2;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  
  protected $fillable = [
    'name', 'key'
  ];

  /**
   * The users that belong to this role.
   */

  public function users()
  {
    return $this->belongsToMany(User::class);
  }

}
