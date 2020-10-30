<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
  protected $table = 'borrow';

  protected $fillable = ['borrowDate','estimatedReturnDate'];

  public function copy()
  {
    return $this->belongsTo(Copy::class);
  }
  public function member()
  {
    return $this->belongsTo(Member::class);
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
