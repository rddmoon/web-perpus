<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
  protected $table = 'copy';

  protected $fillable = ['status'];

  public function book()
  {
    return $this->belongsTo(Book::class);
  }
  public function shelf()
  {
    return $this->belongsTo(Shelf::class);
  }
  public function borrow()
  {
    return $this->hasMany(Borrow::class);
  }
}
