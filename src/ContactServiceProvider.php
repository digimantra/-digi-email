<?php

namespace Kushagra\Testing;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider{
    public function boot(){
        $this->loadViewsFrom(__DIR__. '/views', 'contact.php');
    }
    
    public function register(){
        $this->loadRoutesFrom(__DIR__. '/routes/web.php');

    }
}