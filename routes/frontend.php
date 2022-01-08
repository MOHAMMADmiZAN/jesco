<?php

use App\Http\Livewire\Dashboard\Frontend\IntroSliderCustomize;

Route::get('/', static function () {
    return view('index');
})->name('home');

Route::group(['prefix' => 'frontend', 'middleware' => ['auth:sanctum','verified']], static function(){
    Route::get('/intro_slider',IntroSliderCustomize::class)->name('intro_slider');

});

