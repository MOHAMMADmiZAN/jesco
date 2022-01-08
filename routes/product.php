<?php

use App\Http\Livewire\Dashboard\Category\Categories;
use App\Http\Livewire\Dashboard\Category\Subcategories;
use App\Http\Livewire\Dashboard\Product\ProductData;


Route::group(['prefix' => 'Products','middleware' => ['auth:sanctum','verified']], static function(){
    Route::get('/categories',Categories::class)->name('categories');
    Route::get('/subcategory',Subcategories::class)->name('subcategory');
    Route::get('/product_list',ProductData::class)->name('product');
});
