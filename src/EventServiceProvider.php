<?php
namespace Latfur\Event;

use Illuminate\Support\ServiceProvider;
class EventServiceProvider extends ServiceProvider{
  
    public function boot(){
      $this->loadRoutesFrom(__DIR__.'/routes/web.php');
      $this->loadMigrationsFrom(__DIR__.'/database/migrations');
      $this->loadViewsFrom(__DIR__.'/views','event');
        
      $this->publishes([__DIR__.'/assets' => public_path('vendor/event'),], 'public');
      $this->publishes([__DIR__.'/views' => resource_path('views/vendor/event')]);
       
    }
     public function register(){
        
    }
}
