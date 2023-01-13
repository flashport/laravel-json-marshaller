<?php namespace Tests\Migrations;

use Illuminate\Support\ServiceProvider;

class MigrationsProvider extends ServiceProvider{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void{
        $this->loadMigrationsFrom(__DIR__);
    }

}