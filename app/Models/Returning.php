<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returning extends Model
{
  protected $table = 'returning';

  protected $fillable = ['returnDate'];

  public function member()
  {
    return $this->belongsTo(Member::class);
  }
  public function staff()
  {
    return $this->belongsTo(Staff::class);
  }
  public function borrow()
  {
    return $this->belongsTo(Borrow::class);
  }
}
