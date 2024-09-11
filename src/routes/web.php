<?php

use Kushagra\Testing\Http\Controllers\ContactController;

Route::controller(ContactController::class)->group(function(){
    Route::get('contact', 'contact');
    Route::post('contact', 'store')->name('contact');
});