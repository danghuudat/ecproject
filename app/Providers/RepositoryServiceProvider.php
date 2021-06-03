<?php

namespace App\Providers;

use App\Repositories\Department\Contracts\DepartmentInterface;
use App\Repositories\Department\Eloquent\DepartmentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected static $repositories = [
        'department' => [
            DepartmentInterface::class,
            DepartmentRepository::class,
        ],

    ];

    public function register()
    {
        //
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
