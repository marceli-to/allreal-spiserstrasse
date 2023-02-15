<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Traits\UserScopes;
use App\Traits\UserHelpers;
use App\Traits\UserRelationships;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, UserScopes, UserHelpers, UserRelationships;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'firstname',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];


  /**
  * Get the user's full name.
  *
  * @param  string  $value
  * @return string
  */
 
  public function getFullnameAttribute($value)
  {
    return trim("{$this->firstname} {$this->name}");
  }
}
