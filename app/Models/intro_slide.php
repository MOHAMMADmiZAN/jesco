<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intro_slide extends Model
{
    protected $fillable = ['sale','title','slide_image'];
    use HasFactory;
}
