<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApartmentTypeRelationships;

class ApartmentType extends Model
{
  use ApartmentTypeRelationships;

  public const ATELIER = 'Atelier';
  public const APARTMENT = 'Wohnung';
  public const TOWNHOUSE = 'Townhouse';

  protected $fillable = [
    'description',
  ];
}
