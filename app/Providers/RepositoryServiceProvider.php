<?php

namespace App\Providers;

use App\Repositories\Account\Contracts\AccountInterface;
use App\Repositories\Account\Eloquent\AccountRepository;
use App\Repositories\Department\Contracts\DepartmentInterface;
use App\Repositories\Department\Eloquent\DepartmentRepository;
use App\Repositories\JobRank\Contracts\JobRankInterface;
use App\Repositories\JobRank\Eloquent\JobRankRepository;
use App\Repositories\Source\Contracts\SourceInterface;
use App\Repositories\Source\Eloquent\SourceRepository;
use App\Repositories\Status\Contracts\StatusInterface;
use App\Repositories\Status\Eloquent\StatusRepository;
use App\Repositories\Technology\Contracts\TechnologyInterface;
use App\Repositories\Technology\Eloquent\TechnologyRepository;
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
        'account'=>[
            AccountInterface::class,
            AccountRepository::class
        ],
        'jobrank' => [
            JobRankInterface::class,
            JobRankRepository::class,
        ],
        'source'=>[
            SourceInterface::class,
            SourceRepository::class
        ],
        'status' => [
            StatusInterface::class,
            StatusRepository::class,
        ],
        'technology'=>[
            TechnologyInterface::class,
            TechnologyRepository::class
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
