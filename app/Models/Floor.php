<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FloorRelationships;

class Floor extends Model
{
  use FloorRelationships;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'acronym',
    'decscription',
  ];
}
