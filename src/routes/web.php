<?php

use Kushagra\Testing\Http\Controllers\ContactController;

Route::controller(ContactController::class)->group(function(){
    Route::get('contact', 'index');
    Route::post('contact', 'store')->name('contact');
});