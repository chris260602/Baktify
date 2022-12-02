<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'description', 'price', 'stock', 'category'];

    public function categoryId(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
