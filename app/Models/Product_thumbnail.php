<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_thumbnail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'product_thumbnail_url'];
}
