<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
  protected $table = 'publisher';

  protected $fillable = ['name'];

  public function book()
  {
    return $this->hasMany(Book::class);
  }
}
