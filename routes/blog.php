<?php

use App\Http\Livewire\Dashboard\Blog\BlogData;
use App\Http\Livewire\Frontend\Pages\Blog\Blog;
Route::group(['prefix' => 'Blog', 'middleware' => ['auth:sanctum','verified']], static function(){
    Route::get('/blog-data',BlogData::class)->name('blog-list');
});
Route::get('/blog',Blog::class)->name('blog');
