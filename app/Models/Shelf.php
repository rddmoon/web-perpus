<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
  protected $table = 'shelf';

  protected $fillable = ['name'];

  public function book()
  {
    return $this->hasMany(Book::class);
  }
}
