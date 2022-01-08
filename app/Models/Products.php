<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','sub_category_id','unit_price','quantity','user_id','image_url','description','information'];

    public function category (): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory (): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
    public function user (): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
