<?php

namespace PackagePage\Pages;

use Illuminate\Support\ServiceProvider;

class PagesProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->loadViewsFrom(__DIR__.'/views', 'pages');
       $this->loadRoutesFrom(__DIR__.'/routes/route.php');
       $this->publishes([
        __DIR__.'/views' => base_path('resources/views/pages'),
        ]);       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // include __DIR__ . '/routes/route.php';
        // $this->app->make('PackagePage\Pages\Http\PageController');
        // $this->app->make('PackagePage\Pages\Http\PageCategoryController');
        // $this->app->make('PackagePage\Pages\Http\UserPageController');
        // $this->app->make('PackagePage\Pages\Http\TemplateFieldController');
        // $this->app->make('PackagePage\Pages\Http\TemplateController');
    }
}
