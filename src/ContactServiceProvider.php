<?php

namespace Kushagra\Testing;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider{
    public function boot(){
        $this->loadViewsFrom(__DIR__. '/views', 'kushagra.testing');
        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
    
    public function register(){
        // $this->loadRoutesFrom(__DIR__. '/routes/web.php');
    }
}