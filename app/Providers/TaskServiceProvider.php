<?php
/**
 * Created by PhpStorm.
 * User: duonght6255
 * Date: 5/10/2021
 * Time: 10:10 PM
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // repo
        $this->app->bind(
            \App\UseCases\Task\TaskRepositoryInterface::class,
            \App\UseCases\Task\TaskEloquentRepository::class
        );
    }
}
