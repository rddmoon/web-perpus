<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
  protected $table = 'borrow';

  protected $fillable = ['borrowDate','estimatedReturnDate','status'];

  public function book()
  {
    return $this->belongsTo(Book::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function staff()
  {
    return $this->belongsTo(Staff::class);
  }
  public function returning()
  {
    return $this->belongsTo(Returning::class);
  }
}
