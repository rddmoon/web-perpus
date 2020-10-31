<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
  protected $table = 'staff';

  protected $fillable = ['name', 'address','phone','email','birth','idNumber','user_id'];

  public function borrow()
  {
    return $this->hasMany(Borrow::class);
  }
  public function returning()
  {
    return $this->hasMany(Returning::class);
  }
}
