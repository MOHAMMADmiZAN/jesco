<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['sub_category_name','category_id','user_id'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
