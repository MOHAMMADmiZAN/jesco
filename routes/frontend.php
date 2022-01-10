<?php

use App\Http\Livewire\Dashboard\Frontend\IntroSliderCustomize;
use App\Http\Livewire\Frontend\Pages\SingleProductView\SingleProductView;

Route::get('/', static function () {
    return view('index');
})->name('home');

Route::get('/singleProductView',SingleProductView::class)->name('singleProductView');

Route::group(['prefix' => 'frontend', 'middleware' => ['auth:sanctum','verified']], static function(){
    Route::get('/intro_slider',IntroSliderCustomize::class)->name('intro_slider');

});

