<?php

namespace App\Providers;

use App\Repositories\BrandRepositoryInterface;
use App\Repositories\VehicleRepositoryInterface;
use App\Repositories\ClassGroupRepositoryInterface;
use App\Repositories\Eloquent\BrandRepository;
use App\Repositories\Eloquent\VehicleRepository;
use App\Repositories\Eloquent\ClassGroupRepository;
use App\Repositories\Eloquent\FuelTypeRepository;
use App\Repositories\Eloquent\GearTypeRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\FuelTypeRepositoryInterface;
use App\Repositories\GearTypeRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
        $this->app->bind(FuelTypeRepositoryInterface::class, FuelTypeRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(ClassGroupRepositoryInterface::class, ClassGroupRepository::class);
        $this->app->bind(GearTypeRepositoryInterface::class, GearTypeRepository::class);
    }

}
