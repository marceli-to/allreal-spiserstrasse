<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  public const AVAILABLE = 'available';
  public const RESERVED = 'reserved';
  public const SOLD = 'sold';
}
