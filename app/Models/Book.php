<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $fillable = ['title', 'ISBN', 'publicationYear', 'stock', 'publisher_id', 'author_id', 'category_id', 'shelf_id'];

    public function author()
    {
      return $this->belongsTo(Author::class);
    }
    public function publisher()
    {
      return $this->belongsTo(Publisher::class);
    }
    public function category()
    {
      return $this->belongsTo(Category::class);
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
